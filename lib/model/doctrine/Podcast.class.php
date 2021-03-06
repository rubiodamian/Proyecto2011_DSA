<?php

/**
 * Podcast
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    entrega3
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Podcast extends BasePodcast {

    public function getNameSlug() {
        return Util::slugify($this->getName());
    }

    public function getCategorySlug() {
        return $this->getCategory()->getNameSlug();
    }

    public function setName($name) {
        $this->setSlug(Util::slugify($name));
        return $this->_set('name', $name);
    }

    public function getVisiblePodcast($limit) {
        $q = Doctrine_core::getTable('podcast')
                        ->createQuery('a')->limit($limit);
        return $q;
    }

    public function getLuceneQuery($query) {
        $table = Doctrine_core::getTable('Podcast')->getForLuceneQuery("%$query%");
        return $table;
    }

    public function updateLuceneIndex() {
        $index = PodcastTable::getLuceneIndex();

        // remove an existing entry
        $hit = $index->find('pk' . $this->getId());
        if ($hit) {
            $index->delete($hit->id);
        }

        // don't index expired and non-activated jobs
        if (!$this->getVisible()) {
            return;
        }

        $doc = new Zend_Search_Lucene_Document();

        // store job primary key URL to identify it in the search results
        $doc->addField(Zend_Search_Lucene_Field::Keyword('pk', $this->getId()));

        // index job fields
        $doc->addField(Zend_Search_Lucene_Field::UnStored('name', $this->getName(), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::UnStored('contact', $this->getContact(), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::UnStored('description', $this->getDescription(), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::UnStored('category', $this->getCategory(), 'utf-8'));

        // add job to the index
        $index->addDocument($doc);
        $index->commit();
    }

    public function save(Doctrine_Connection $conn = null) {
        // ...

        $conn = $conn ? $conn : $this->getTable()->getConnection();
        $conn->beginTransaction();
        try {
            $name = $this->getNameSlug() . '-' . md5(time());
            $this->photoFile($name);

            $ret = parent::save($conn);

            $this->updateLuceneIndex();

            $conn->commit();

            return $ret;
        } catch (Exception $e) {
            $conn->rollBack();
            throw $e;
        }
    }

    public function delete(Doctrine_Connection $conn = null) {
        $index = PodcastTable::getLuceneIndex();
        $hit = $index->find('pk' . $this->getId());
        if ($hit) {
            $index->delete($hit->id);
        }
        $this->deletePhotoFile();
        return parent::delete($conn);
    }

    public function thumbailPhoto($img, $name) {
        $thum = new sfImageThumbnailGeneric(220, 148, 'center', null);
        $thum->execute($img)->saveAs(sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'podcast_image' . DIRECTORY_SEPARATOR . 'thumb' . DIRECTORY_SEPARATOR . $name, 'image/jpeg');
        ;
    }

    public function principalPhoto($img, $name) {
        $thum = new sfImageThumbnailGeneric(460, 300, 'scale', null);
        $thum->execute($img)->saveAs(sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'podcast_image' . DIRECTORY_SEPARATOR . $name, 'image/jpeg');
        ;
    }

    public function photoFile($name) {
        if (sfContext::hasInstance()) {
            $filename = sfContext::getInstance()->getRequest()->getFiles('podcast');
            //print_r($filename);die;
            foreach ($filename as $file => $data) {
                if (file_exists($data['tmp_name'])) {
                    $img = new sfImage($data['tmp_name']);
                    $response = sfContext::getInstance()->getResponse();
                    $name = $name . '.jpeg';
                    $this->setImage($name);
                    $img->setMIMEType('jpeg');
                    $response->setContentType($img->getMIMEType());
                    $this->thumbailPhoto($img->copy(), $name);
                    $this->principalPhoto($img->copy(), $name);
                }
            }
        }
    }

    public function deletePhotoFile() {
        @unlink(sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'podcast_image' . DIRECTORY_SEPARATOR . 'thumb' . DIRECTORY_SEPARATOR . $this->getImage());
        @unlink(sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'podcast_image' . DIRECTORY_SEPARATOR . $this->getImage());
    }

}