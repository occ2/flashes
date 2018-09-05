<?php
/*
 * The MIT License
 *
 * Copyright 2018 Milan Onderka <milan_onderka@occ2.cz>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace occ2\flashes;

use Nette\Application\UI\Presenter;

/**
 * trait that extend flash message functionality
 * if used in presenter put flashes.latte into app/templates
 * if used in control put flashes.latte into your control folder
 *
 * @author Milan Onderka
 * @version 1.1.0
 */
trait TFlashMessage
{

    /**
     * extend flash message
     * @param string $message
     * @param string $type
     * @param string $comment
     * @param string $icon
     * @return \stdClass
     */
    public function flashMessage($message, $type = 'default', $comment=null, $icon=null, $width=50, $iconSize="lg", $timeout=5)
    {
        $id = $this->getParameterId('flash');
        $presenter = $this->getPresenter();
        if($presenter instanceof Presenter){
            $messages = $presenter->getFlashSession()->$id;
        } else {
            $messages = null;
        }

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
        if($presenter instanceof Presenter){
            $presenter->getFlashSession()->$id = $messages;
        }
        return $flash;
    }
}