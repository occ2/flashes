<?php
namespace occ2\flashes;

/**
 * trait that extend flash message functionality
 * if used in presenter put flashes.latte into app/templates
 * if used in control put flashes.latte into your control folder 
 *
 * @author Milan Onderka
 * @version 1.0.0
 */
trait TFlashMessage {

    /**
     * extend flash message
     * @param string $message
     * @param string $type
     * @param string $comment
     * @param string $icon
     * @return \stdClass
     */
     public function flashMessage($message, $type = 'default',$comment=null,$icon=null,$width=75,$iconSize="lg",$timeout=5){
         $id = $this->getParameterId('flash');
         $messages = $this->getPresenter()->getFlashSession()->$id;
         $messages[] = $flash = (object) [
             'title' => $message,
             'type' => $type,
             'comment' => $comment,
             'icon' => $icon,
             'width' => $width,
             'iconSize' =>$iconSize,
             'timeout' => $timeout
         ];
         $this->getTemplate()->flashes = $messages;
         $this->getPresenter()->getFlashSession()->$id = $messages;
         return $flash;
     }
}
