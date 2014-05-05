<?php
class ReportController extends \BaseController
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function product()
	{
	}

	public function user()
	{
		$reports = Report::user($this->current_user->store_id);
		
		return View::make('report.user', compact('reports'));
	}

	public function overview()
	{
		# code...
	}
}