<?php

namespace App\AbstractClass;

abstract class AbstractForm
{
	protected $config;
	protected $html = "";

	public function __construct($config)
	{
		$this->config = $config;
		$this->initForm();


		foreach ($this->config["inputs"] as $name => $configInput) {


			if (isset($configInput['row'])) {
				if ($configInput['row'] == 'start' || $configInput['row'] == 'start_end') {
					$this->html .= "<div class='row'>";
				}
			}

			if ($configInput["type"] == "select") {
				$this->generateSelect($name, $configInput);
			} else if ($configInput["type"] == "captcha") {
				$this->generateCaptcha($name, $configInput);
			} else if ($configInput["type"] == "textarea") {
				$this->generateTextarea($name, $configInput);
			} else if ($configInput["type"] == "editor") {
				$this->generateEditor($name, $configInput);
			} else if ($configInput["type"] == "hidden") {
				if (isset($configInput['value'])) $this->generateHiddenField($name, $configInput);
			} else {
				$this->generateInput($name, $configInput);
			}

			if (isset($configInput['row'])) {
				if ($configInput['row'] == 'end' || $configInput['row'] == 'start_end') {
					$this->html .= "</div>";
				}
			}
		}
		$this->closeForm();
	}

	public function initForm()
	{
		$this->html = "
		<div class='container' id='container'>
			<form id=" . ($this->config['form-id'] ?? "") . " class=" . ($this->config['class'] ?? "") .  " action='" . ($this->config["action"] ?? "") . "' method='" . ($this->config["method"] ?? "GET") . "' accept-charset='utf-8'>"
			. (isset($this->config['form-title']) ? "<h1>{$this->config['form-title']}</h1>" : "");
	}

	public function generateSelect($name, $configInput)
	{
		$this->html .=
			"
		<div class='" . implode(' ', $configInput['class']) . "'>
		<label>" . $configInput['label'] . "</label>
		<select class='inputs-design' name='" . $name . "'>";
		foreach ($configInput["options"] as $option) {
			$selected = (isset($configInput["value"]) && $configInput["value"] == $option['value']) ? "selected" : "";
			$this->html .= "<option ". $selected . " value='".$option['value']."'>" . $option['label'] . "</option>";
		}
		$this->html .= "</select></div>";
	}

	public function generateTextarea($name, $configInput)
	{
		$this->html .=
			"
		<div class='" . implode(' ', $configInput['class']) . "'>
		<label>" . $configInput['label'] . "</label>
		<textarea class='inputs-design 'name='" . $name . "' placeholder='" . $configInput['placeholder'] . "' rows='" . $configInput['rows'] . "' cols='" . $configInput['cols'] . "'  ></textarea></div>";
	}


	public function generateCaptcha($name, $configInput)
	{
		$this->html .= "<img src='" . $configInput['src'] . "' width='200px'><input placeholder='" . htmlspecialchars($configInput["placeholder"] ?? "", ENT_QUOTES) . "' name='" . $name . "' >";
	}

	public function generateInput($name, $configInput)
	{
		$step = (isset($configInput['type']) && $configInput["type"] == "number") ? "step='0.01'" : "";
		$this->html .=
			"
		<div class='" . implode(' ', $configInput['class']) . "'>
		<label>" . $configInput['label'] . "</label>
		<input class='inputs-design' name='" . $name . "' 

			type='" . ($configInput["type"] ?? "text") . "'
			$step
			placeholder='" . htmlspecialchars($configInput["placeholder"] ?? "", ENT_QUOTES) . "'

			" . (($configInput["required"] == true) ? "required='required'" : "") . "

			value='" . htmlspecialchars($configInput["value"] ?? "", ENT_QUOTES) . "'

		></div>";
	}

	public function generateEditor($name, $configInput)
	{
		$this->html .= "
		<div class='" . implode(' ', $configInput['class']) . "'>
		<textarea id='editor' name='" . $name . "' placeholder='" . $configInput['placeholder'] . "'>" . htmlspecialchars($configInput["value"] ?? "", ENT_QUOTES) . "</textarea>
		</div>

		<script>
			ClassicEditor
            .create( document.querySelector( '#editor' ), {
				height: 200
			})
			.then( newEditor => {
				editor = newEditor;
			} )
            .catch( error => {
                console.error( error );
            } );
		</script>
		";
	}

	public function generateHiddenField($name, $configInput)
	{
		$this->html .= "<input type='hidden' name='" . $name . "' value='" . $configInput['value'] . "'>";
	}

	public function closeForm()
	{

		$this->html .= "<div class='submit_row my-6'><input class='submit_button my-6' type='submit' value='" . htmlspecialchars($this->config["submit"] ?? "Valider", ENT_QUOTES) . "'></div>";
		$this->html .= "</form></div>";
	}


	public function renderHtml()
	{
		return $this->html;
	}
}
