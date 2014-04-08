<?php
/**
 * 
 * Timestamp class for accessing time stamps
 * 
 * @author shubham
 *
 */


class timestamp{

	private $_current_timestamp;
	
	/**
	 * 
	 * constructor for getting current time stamp
	 */
	public function __construct()
	{
		$this->setTimeStamp();
	}
	
	/**
	 * 
	 * function to set the time stamp
	 */
	public function setTimeStamp()
	{
		$this->_current_timestamp = time();
	}
	
	/**
	 * 
	 * function to get the time stamp
	 */
	public function getTimeStamp()
	{
		return $this->_current_timestamp;
	}
	
	/**
	 * 
	 * function to get the current time
	 */
	public function getCurrentTime()
	{
		echo date("h-s-m");
	
	}
	
	/**
	 * 
	 * function to get the current date
	 */
	public function getCurrentDate()
	{
		echo date("Y-m-d");	
	
	}
	
	/**
	 * 
	 * function to get the time from given time stamp
	 * @param bigint $time_stamp time stamp from which we have to extract time
	 */
	public function getTimeByTimestamp($time_stamp)
	{
		return date("h-s",$time_stamp);
	
	}
	
	/**
	 * 
	 * function to get the date from given time stamp
	 * @param bigint $time_stamp time stamp from which we have to extract date
	 */
	public function getDateByTimestamp($time_stamp)
	{
		return date("Y-m-d",$time_stamp);
	}
	
	/**
	 * 
	 * function for setting up the time zone
	 * @param string $time_zone time zone given by the user
	 */
	public function setTimeZone($time_zone)
	{
		date_default_timezone_set($time_zone);
	
	}
	
	/**
	 * 
	 * function to get the time zone 
	 */
	public function getTimeZone()
	{
		return date_default_timezone_get();
	}
	
}