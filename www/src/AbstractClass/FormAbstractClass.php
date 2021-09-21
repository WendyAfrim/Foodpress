<?php 

namespace App\AbstractClass;

class FormAbstractClass 
{
    private $config;
    private $html = "";

    public function __construct($config)
    {
		$this->config = $config;
        $this->initForm();
        
		foreach ($this->config["inputs"] as $name => $configInput) {
			if($configInput["type"]=="select"){
				$this->generateSelect($name, $configInput);	
			}
			else if($configInput["type"]=="captcha"){
				$this->generateCaptcha($name, $configInput);	
			}else {
				$this->generateInput($name, $configInput);	
			}
        }
        
		$this->closeForm();
    }

    public function initForm() {
		$this->html = "<form action='".($this->config["action"]??"")."' method='".($this->config["method"]??"GET")."'>";
	}



	public function generateSelect($name, $configInput) {
		$this->html .="<select name='".$name."'>";
		foreach ($configInput["options"] as $option) {
			$this->html .="<option>".$option."</option>";
		}
		$this->html .="</select>";
	}


	public function generateCaptcha($name, $configInput) {
		$this->html .="<img src='".$configInput['src']."' width='200px'><input placeholder='".htmlspecialchars($configInput["placeholder"]??"", ENT_QUOTES)."' name='".$name."' >";
		
	}

	public function generateInput($name, $configInput) {

		$this->html .="<input name='".$name."' 

			type='".($configInput["type"]??"text")."'

			placeholder='".htmlspecialchars($configInput["placeholder"]??"", ENT_QUOTES)."'

			".( ($configInput["required"] == true)?"required='required'":"" )."

			value='".htmlspecialchars($configInput["value"]??"", ENT_QUOTES)."'

		  >";
	}


	public function closeForm() {
		$this->html .= "<input type='submit' value='".htmlspecialchars($this->config["submit"]??"Valider", ENT_QUOTES)."'>";
		$this->html .= "</form>";
	}

	
	public function renderHtml() {
		return $this->html;
	}

}