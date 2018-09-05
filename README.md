# occ2/flashes

This package is extra contrib of nette/application flash messages. It use Twitter Bootstrap4 styles (alert). If you need use it please move flashes.latte into your application template directory (or your Control template directory)

** Installation: **
_composer require occ2/flashes_

** Usage: **
In presenter

	<?php
	
	namespace MyApp\Presenters;
	
	use Nette\Application\UI\Presenter
	
	class MyPresenter extends Presenter{
		use TFlashMessage;
		
		public function handleSomething(){
		 ... // some code
		 
		 $this->flashMessage("Error message","danger", "some comment of message", "fa fas-cross", 75, "xl", 10);
		 if($this->isAjax(){
		 	$this->redrawControl();
		 }
		 else{
		 	$this->redirect("this");
		 }
		}
	}
	
### Params of flashMessage() function

1. $message - alert title
2. $type - alert type (success, primary, info, warning, danger)
3. $comment - comment of message
4. $icon - icon class (for example from Font Awesome)
5. $width - alert width (relative - may be 25,50,75,100)
6. $size - icon size prefix (may be xs, sm, lg, xl)
7. $delay - number of seconds to autohide flash message
