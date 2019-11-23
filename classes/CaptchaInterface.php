<?php
namespace PHPMaker2020\p_keuangan_v1_0;

/**
 * Captcha interface
 */
interface CaptchaInterface
{
	public function getHtml();
	public function getConfirmHtml();
	public function validate();
	public function getScript();
}
?>