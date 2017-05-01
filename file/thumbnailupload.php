<?php
  namespace File;

  use File\Upload;

  require_once 'upload.php';
  require_once 'thumbnail.php';

  class ThumbnailUpload extends Upload {
    protected $thumbDestination;
    protected $deleteOriginal;
    protected $suffix = '_thb';
    public function __construct($path, $deleteOriginal = false) {
        parent::__construct($path);
        $this->thumbDestination = $path;
        $this->deleteOriginal = $deleteOriginal;
    }
    public function setThumbDestination($path) {
        if (!is_dir($path) || !is_writable($path)) {
            throw new \Exception("$path must be a valid, writable directory.");
        }
        $this->thumbDestination = $path;
    }
    public function setThumbSuffix($suffix) {
        if (preg_match('/\w+/', $suffix)) {
            if (strpos($suffix, '_') !== 0) {
                $this->suffix = '_' . $suffix;
            } else {
                $this->suffix = $suffix;
            }
        } else {
            $this->suffix = '';
        }
    }
    public function allowAllTypes() {
        $this->typeCheckingOn = true;
    }
    protected function createThumbnail($image) {
        $thumb = new Thumbnail($image);
        $thumb->setDestination($this->thumbDestination);
        $thumb->setSuffix($this->suffix);
        $thumb->create();
        $messages = $thumb->getMessages();
        $this->messages = array_merge($this->messages, $messages);
    }

    protected function moveFile($file, $number) {
        $filename = isset($this->newName) ? $this->newName : $file['name'];
        $filename = "9" . "_" . $filename;
        $success = move_uploaded_file($file['tmp_name'], $this->destination . $filename);
        if ($success) {
            // add a message only if the original image is not deleted
            if (!$this->deleteOriginal) {
                $result = $file['name'] . ' was uploaded successfully';
                if (!is_null($this->newName)) {
                    $result .= ', and was renamed ' . $this->newName;
                }
                $this->messages[] = $result;
            }
            // create a thumbnail from the uploaded image
            $this->createThumbnail($this->destination . $filename);
            // delete the uploaded image if required
            if ($this->deleteOriginal) {
                unlink($this->destination . $filename);
            }
        } else {
            $this->messages[] = 'Could not upload ' . $file['name'];
        }
    }
    /*protected function moveFile($file) {
        $filename = isset($this->newName) ? $this->newName : $file['name'];
        $success = move_uploaded_file($file['tmp_name'], $this->destination . $filename);
        if ($success) {
            $result = $file['name'] . ' was uploaded successfully';
            if (!is_null($this->newName)) {
                $result .= ', and was renamed ' . $this->newName;
            }
            $this->messages[] = $result;
        } else {
            $this->messages[] = 'Could not upload ' . $file['name'];
        }
    }*/
  }
 ?>
