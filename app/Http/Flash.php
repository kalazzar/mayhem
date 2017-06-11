<?php 

namespace App\Http; 
class Flash
{

	/**
	 * Initializes a flash session  
	 *
	 * @param String $title
	 * @param String $message
	 * @param String level 
	 * @param String key 
	 *
	 * @return Session flash
	 */
	public function create($title,$message,$level,$key='flash_message')
	{
		return session()->flash($key,[
			'title'=>$title, 
		 	'message'=>$message,
			'level'=>$level
		]); 
	}

	/**
	 * Info Alert
	 * 
	 */
	public function info($title,$message)
	{
		$this->create($title,$message,'info'); 
	}

	/**
	 * Success Alert
	 * 
	 */
	public function success($title,$message)
	{
		$this->create($title,$message,'success'); 
	}

	/**
	 * Error Alert
	 * 
	 */
	public function error($title,$message)
	{
		$this->create($title,$message,'error'); 

	}

	/**
	 * Overlay Alert
	 * 
	 */
	public function overlay($title,$message,$level='success')
	{
		$this->create($title,$message,$level,'flash_message_overlay'); 
	}

	public function overlayWithTimer($title,$message,$level)
	{
		$this->create($title,$message,$level,'flash_message_overlayWithTimer'); 
	}

	public function loginPrompt($title,$message,$level)
	{
		$this->create($title,$message,$level,'flash_message_loginPrompt'); 
	}

	public function errorNotConfirm($title,$message,$level='error')
	{
		$this->create($title,$message,$level,'flash_message_errorNotConfirm'); 
	}

}