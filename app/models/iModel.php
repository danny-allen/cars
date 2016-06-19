<?php

interface iModel
{

	/**
	 * find
	 *
	 * Find all from model
	 */
	public static function find();


	/**
	 * findFirst
	 *
	 * Find one item
	 */
	public static function findFirst();


	/**
	 * getSource
	 *
	 * Identify the database table
	 */
	public function getSource();
}