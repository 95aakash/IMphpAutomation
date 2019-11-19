<?php
session_start();

if(!isset($_SESSION['accessToken'])){
   header('HTTP/1.1 403 Forbidden');
   echo 'Unauthorised';
	exit();
	
}

?>



<!-- <!DOCTYPE html> -->
<html>
	<head>
		<!--
			ExtentReports Library 2.41.1 | http://relevantcodes.com/extentreports-for-selenium/ | https://github.com/anshooarora/
			Copyright (c) 2015, Anshoo Arora (Relevant Codes) | Copyrights licensed under the New BSD License | http://opensource.org/licenses/BSD-3-Clause
			Documentation: http://extentreports.relevantcodes.com 
		-->

		<meta charset='UTF-8' /> 
		<meta name='description' content='ExtentReports (by Anshoo Arora) is a reporting library for automation testing for .NET and Java. It creates detailed and beautiful HTML reports for modern browsers. ExtentReports shows test and step summary along with dashboards, system and environment details for quick analysis of your tests.' />
		<meta name='robots' content='noodp, noydir' />
		<meta name='viewport' content='width=device-width, initial-scale=1' />
		<meta name='extentx' id='extentx' content='' />
		
		<title>
				ExtentReports 2.0
		</title>
		
		
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>
		<link href='https://cdn.rawgit.com/anshooarora/extentreports/6032d73243ba4fe4fb8769eb9c315d4fdf16fe68/cdn/extent.css' type='text/css' rel='stylesheet' />
		
		<style>
				
            
                
            
        
		</style>
	</head>
	
	
	<body class='extent default standard hide-overflow'>
		<!-- nav -->
		<nav>
			<div class='logo-container blue darken-2'>
				<a class='logo-content' href='http://extentreports.relevantcodes.com'>
					<span>ExtentReports</span>
				</a>
				<a href='#' data-activates='slide-out' class='button-collapse hide-on-large-only'><i class='mdi-navigation-apps'></i></a>
			</div>
			<ul id='slide-out' class='side-nav fixed hide-on-med-and-down'>
				<li class='analysis waves-effect active'><a href='#!' class='test-view' onclick="_updateCurrentStage(0)"><i class='mdi-action-dashboard'></i>Test Details</a></li>
				<li class='analysis waves-effect'>
					<a href='#!' onclick="_updateCurrentStage(-1)" class='dashboard-view'><i class='mdi-action-track-changes'></i></i>Analysis</a>
				</li>
			</ul>
			<span class='report-name'>Web Service</span> <span class='report-headline'>Regression Automation Report</span>
			<ul class='right hide-on-med-and-down nav-right'>
				<li class='theme-selector' alt='Click to toggle dark theme. To enable by default, use js configuration $("body").addClass("dark");' title='Click to toggle dark theme. To enable by default, use js configuration $("body").addClass("dark");'>
					<i class='mdi-hardware-desktop-windows'></i>
				</li>
				<li>
					<span class='suite-started-time'>2019-09-27 15:32:40</span>
				</li>
				<li>
					<span>v2.41.1</span>
				</li>
			</ul>
		</nav>
		<!-- /nav -->
		
		<!-- container -->
		<div class='container'>
			
			<!-- dashboard -->
			<div id='dashboard-view' class='row'>
				<div class='time-totals'>
					<div class='col l2 m4 s6'>
						<div class='card suite-total-tests'> 
							<span class='panel-name'>Total Tests</span> 
							<span class='total-tests'> <span class='panel-lead'></span> </span> 
						</div> 
					</div>
					<div class='col l2 m4 s6'>
						<div class='card suite-total-steps'> 
							<span class='panel-name'>Total Steps</span> 
							<span class='total-steps'> <span class='panel-lead'></span> </span> 
						</div> 
					</div>
					<div class='col l2 m4 s12'>
						<div class='card suite-total-time-current'> 
							<span class='panel-name'>Total Time Taken (Current Run)</span> 
							<span class='suite-total-time-current-value panel-lead'>0h 0m 11s+808ms</span> 
						</div> 
					</div>
					<div class='col l2 m4 s12'>
						<div class='card suite-total-time-overall'> 
							<span class='panel-name'>Total Time Taken (Overall)</span> 
							<span class='suite-total-time-overall-value panel-lead'>0h 0m 11s+808ms</span> 
						</div> 
					</div>
					<div class='col l2 m4 s6 suite-start-time'>
						<div class='card accent green-accent'> 
							<span class='panel-name'>Start</span> 
							<span class='panel-lead suite-started-time'>2019-09-27 15:32:28</span> 
						</div> 
					</div>
					<div class='col l2 m4 s6 suite-end-time'>
						<div class='card accent pink-accent'> 
							<span class='panel-name'>End</span> 
							<span class='panel-lead suite-ended-time'>2019-09-27 15:32:40</span> 
						</div> 
					</div>
				</div>
				<div class='charts'>
					<div class='col s12 m6 l4 fh'> 
						<div class='card-panel'> 
							<div>
								<span class='panel-name'>Tests View</span>
							</div> 
							<div class='panel-setting modal-trigger test-count-setting right'>
								<a href='#test-count-setting'><i class='mdi-navigation-more-vert text-md'></i></a>
							</div> 
							<div class='chart-box'>
								<canvas class='text-centered' id='test-analysis'></canvas>
							</div> 
							<div>
								<span class='weight-light'><span class='t-pass-count weight-normal'></span> test(s) passed</span>
							</div> 
							<div>
								<span class='weight-light'><span class='t-fail-count weight-normal'></span> test(s) failed, <span class='t-others-count weight-normal'></span> others</span>
							</div> 
						</div> 
					</div> 
					<div class='col s12 m6 l4 fh'> 
						<div class='card-panel'> 
							<div>
								<span class='panel-name'>Steps View</span>
							</div> 
							<div class='panel-setting modal-trigger step-status-filter right'>
								<a href='#step-status-filter'><i class='mdi-navigation-more-vert text-md'></i></a>
							</div> 
							<div class='chart-box'>
								<canvas class='text-centered' id='step-analysis'></canvas>
							</div> 
							<div>
								<span class='weight-light'><span class='s-pass-count weight-normal'></span> step(s) passed </span>
							</div> 
							<div>
								<span class='weight-light'><span class='s-fail-count weight-normal'></span> step(s) failed, <span class='s-others-count weight-normal'></span> others</span>
							</div> 
						</div> 
					</div>
					<div class='col s12 m12 l4 fh'> 
						<div class='card-panel'> 
							<span class='panel-name'>Pass Percentage</span> 
							<span class='pass-percentage panel-lead'></span> 
							<div class='progress light-blue lighten-3'> 
								<div class='determinate light-blue'></div> 
							</div> 
						</div> 
					</div>
				</div>
				<div class='system-view'>
					<div class='col l4 m12 s12'>
						<div class='card-panel'>
							<span class='label info outline right'>Environment</span>
							<table>
								<thead>
									<tr>
										<th>Param</th>
										<th>Value</th>
									</tr>
								</thead>
								<tbody>
										<tr>
											<td>User Name</td>
											<td>Abhinav Tripathi</td>
										</tr>
										<tr>
											<td>OS</td>
											<td>Windows 10</td>
										</tr>
										<tr>
											<td>Java Version</td>
											<td>1.8.0_221</td>
										</tr>
										<tr>
											<td>Host Name</td>
											<td>DESKTOP-8BNLL6Q</td>
										</tr>
										<tr>
											<td>Environment</td>
											<td>QA-STAGE</td>
										</tr>
										<tr>
											<td>UserName</td>
											<td>SOA-QA Team</td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /dashboard -->
			
			<!-- tests -->
			<div id='test-view' class='row _addedTable'>
				<div class='col _addedCell1'>
					<div class='contents'>
						<div class='card-panel heading'>
							<h5>Tests</h5>
						</div>
						<div class='card-panel filters'>
							<div>
								<a class='dropdown-button btn-floating btn-small waves-effect waves-light grey tests-toggle' data-activates='tests-toggle' data-constrainwidth='true' data-beloworigin='true' data-hover='true' href='#'>
									<i class='mdi-action-reorder'></i>
								</a>
								<ul id='tests-toggle' class='dropdown-content'>
									<li class='pass'><a href='#!'>Pass</a></li>
									<li class='fail'><a href='#!'>Fail</a></li>
									<li class='skip'><a href='#!'>Skip</a></li>
									<li class='divider'></li>
									<li class='clear'><a href='#!'>Clear Filters</a></li>
								</ul>
							</div>
							<div>
								<a class='btn-floating btn-small waves-effect waves-light grey' id='clear-filters' alt='Clear Filters' title='Clear Filters'>
									<i class='mdi-navigation-close'></i>
								</a>
							</div>
							<div>
								<a class='btn-floating btn-small waves-effect waves-light grey' id='enableDashboard' alt='Enable Dashboard' title='Enable Dashboard'>
									<i class='mdi-action-track-changes'></i>
								</a>
							</div>
							<div>
								<a class='btn-floating btn-small waves-effect waves-light blue enabled' id='refreshCharts' alt='Refresh Charts on Filters' title='Refresh Charts on Filters'>
									<i class='mdi-navigation-refresh'></i>
								</a>
							</div>
							<div class='search' alt='Search Tests' title='Search Tests'>
								<div class='input-field left'>
									<input id='searchTests' type='text' class='validate' placeholder='Search Tests...'>
								</div>
								<a href="#" class='btn-floating btn-small waves-effect waves-light grey'>
									<i class='mdi-action-search'></i>
								</a>
							</div>
						</div>
						<div class='card-panel no-padding-h no-padding-v no-margin-v'>
							<div class='wrapper'>
								<ul id='test-collection' class='test-collection'>
										<li class='collection-item test displayed active pass ' extentid='b2bff8ff-d0c5-4008-9c66-5ed226f68c31'>
											<div class='test-head'>
												<span class='test-name'>AK_generation </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:28</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:31</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 2s+506ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:31</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:31</td>
																	<td class='step-details'>AK_Generation</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
										<li class='collection-item test displayed active pass ' extentid='3fa565b1-b3bf-4f89-b638-7bb63be47755'>
											<div class='test-head'>
												<span class='test-name'>Add_product_with_all_valid_parameter </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:31</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:32</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 1s+434ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:32</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:32</td>
																	<td class='step-details'>Add_Product_With_all_Valid_Parameter</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
										<li class='collection-item test displayed active pass ' extentid='eae952e5-cc97-48ca-82bf-0bd7ffa41378'>
											<div class='test-head'>
												<span class='test-name'>Add_Product_With_Blank_Validation_Key </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:32</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:33</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 0s+612ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:33</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:33</td>
																	<td class='step-details'>Add_Product_With_Blank_Validation_Key</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
										<li class='collection-item test displayed active pass ' extentid='5ca06b89-d74e-487f-b2ec-198f70e9cda3'>
											<div class='test-head'>
												<span class='test-name'>Add_Product_with_Blank_GLuserId </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:33</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:34</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 0s+649ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:34</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:34</td>
																	<td class='step-details'>Add_Product_with_Blank_GLuserId</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
										<li class='collection-item test displayed active pass ' extentid='914dbfb6-9366-4609-ba4c-0fd885ac2471'>
											<div class='test-head'>
												<span class='test-name'>Add_Product_With_Blank_Last_accessed </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:34</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:34</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 0s+675ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:34</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:34</td>
																	<td class='step-details'>Add_Product_With_Blank_Last_accessed</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
										<li class='collection-item test displayed active pass ' extentid='4a0b347b-56f9-4754-a2ef-b464e1081da0'>
											<div class='test-head'>
												<span class='test-name'>Add_Product_With_Length_Exceeded_Of_Last_accessed </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:34</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:35</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 0s+692ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:35</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:35</td>
																	<td class='step-details'>Add_Product_With_Length_Exceeded_Of_Last_accessed</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
										<li class='collection-item test displayed active pass ' extentid='d72786b4-fd34-4c17-be90-9c61ecb473b3'>
											<div class='test-head'>
												<span class='test-name'>Add_Product_With_Blank_Updated_by </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:35</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:36</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 0s+663ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:36</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:36</td>
																	<td class='step-details'>Add_Product_With_Blank_Updated_by</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
										<li class='collection-item test displayed active pass ' extentid='2b26b2e1-2fc8-4a7b-ac20-01be8311b626'>
											<div class='test-head'>
												<span class='test-name'>Add_Product_With_Blank_Item_Name </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:36</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:36</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 0s+682ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:36</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:36</td>
																	<td class='step-details'>Add_Product_With_Blank_Item_Name</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
										<li class='collection-item test displayed active pass ' extentid='2bfe341b-0001-45e1-ad16-932b8bc0a565'>
											<div class='test-head'>
												<span class='test-name'>Add_Product_With_Exceed length_Of_Country_Name </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:36</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:37</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 0s+653ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:37</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:37</td>
																	<td class='step-details'>Add_Product_With_Exceed_length_Of_Country_Name</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
										<li class='collection-item test displayed active pass ' extentid='be04ec98-3540-4419-a7a6-3413d18b7856'>
											<div class='test-head'>
												<span class='test-name'>Add_Product_With_Exceeding_Length_Hotnew_Value </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:37</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:38</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 0s+665ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:38</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:38</td>
																	<td class='step-details'>Add_Product_With_Exceeding_Length_Hotnew_Value</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
										<li class='collection-item test displayed active pass ' extentid='9f1966a9-a3c6-4a4d-a240-bb37fa9ce946'>
											<div class='test-head'>
												<span class='test-name'>Add_Product_with_Blank_Modules_Value </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:38</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:39</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 0s+987ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:39</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:39</td>
																	<td class='step-details'>Add_Product_with_Blank_Modules_Value</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
										<li class='collection-item test displayed active pass ' extentid='570d8a62-7f86-439b-8347-99c675a7ebc7'>
											<div class='test-head'>
												<span class='test-name'>Add_Product_With_0_fob_price </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:39</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:39</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 0s+633ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:39</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:39</td>
																	<td class='step-details'>Add_Product_With_0_fob_price</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
										<li class='collection-item test displayed active pass ' extentid='e4a2e935-8529-4899-86c2-e2b88afae321'>
											<div class='test-head'>
												<span class='test-name'>Add_Product_With_Exceed_length_Of_Fob_Price_Currency </span>
												<span class='test-status label right outline capitalize pass'>pass</span>
												<span class='category-assigned hide '></span>
											</div>
											<div class='test-body'>
												<div class='test-info'>
													<span title='Test started time' alt='Test started time' class='test-started-time label green lighten-1 text-white'>2019-09-27 15:32:39</span>
													<span title='Test ended time' alt='Test ended time' class='test-ended-time label red lighten-1 text-white'>2019-09-27 15:32:40</span>
													<span title='Time taken to finish' alt='Time taken to finish' class='test-time-taken label blue-grey lighten-3 text-white'>0h 0m 0s+596ms</span>
												</div>
												<div class='test-desc'></div>
												<div class='test-attributes'>
												</div>
												<div class='test-steps'>
													<table class='bordered table-results'>
														<thead>
															<tr>
																<th>Status</th>
																<th>Timestamp</th>
																<th>Details</th>
															</tr>
														</thead>
														<tbody>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:40</td>
																	<td class='step-details'>Test Case Passed</td>
																</tr>
																<tr>
																	<td class='status pass' title='pass' alt='pass'><i class='mdi-action-check-circle'></i></td>
																	<td class='timestamp'>15:32:40</td>
																	<td class='step-details'>Add_Product_With_Exceed_length_Of_Fob_Price_Currency</td>
																</tr>
														</tbody>
													</table>
													<ul class='collapsible node-list' data-collapsible='accordion'>
													</ul>
												</div>
											</div>
										</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div id='test-details-wrapper' class='col _addedCell2'>
					<div class='contents'>
						<div class='card-panel details-view'>
							<h5 class='details-name'></h5>
							<div class='step-filters right'>
								<span class='btn-floating btn-small waves-effect waves-light blue' status='info' alt='info' title='info'><i class='mdi-action-info-outline'></i></span>
								<span class='btn-floating btn-small waves-effect waves-light green' status='pass' alt='pass' title='pass'><i class='mdi-action-check-circle'></i></span>
								<span class='btn-floating btn-small waves-effect waves-light red' status='fail' alt='fail' title='fail'><i class='mdi-navigation-cancel'></i></span>
								<span class='btn-floating btn-small waves-effect waves-light red darken-4' status='fatal' alt='fatal' title='fatal'><i class='mdi-navigation-cancel'></i></span>
								<span class='btn-floating btn-small waves-effect waves-light red lighten-2' status='error' alt='error' title='error'><i class='mdi-alert-error'></i></span>
								<span class='btn-floating btn-small waves-effect waves-light orange' alt='warning' status='warning' title='warning'><i class='mdi-alert-warning'></i></span>
								<span class='btn-floating btn-small waves-effect waves-light cyan' status='skip' alt='skip' title='skip'><i class='mdi-content-redo'></i></span>
								<span class='btn-floating btn-small waves-effect waves-light grey darken-2' status='clear-step-filter' alt='Clear filters' title='Clear filters'><i class='mdi-content-clear'></i></span>
							</div>
							<div class='details-container'>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /tests -->
			
			<!-- categories -->
			<!-- /categories -->
			
			<!-- exceptions -->
			<!-- /exceptions -->
			
			<!-- testrunner logs -->
			<!-- /testrunner logs -->
			
		</div>
		<!-- /container -->
		
		<!-- test dashboard counts setting -->
		<div id='test-count-setting' class='modal bottom-sheet'> 
			<div class='modal-content'> 
				<h5>Configure Tests Count Setting</h5> 
				<input name='test-count-setting' type='radio' id='parentWithoutNodes' class='with-gap'> 
				<label for='parentWithoutNodes'>Parent Tests Only (Does not include child nodes in counts)</label> 
				<br> 
				<input name='test-count-setting' type='radio' id='parentWithoutNodesAndNodes' class='with-gap'> 
				<label for='parentWithoutNodesAndNodes'>Parent Tests Without Child Tests + Child Tests</label> 
				<br> 
				<input name='test-count-setting' type='radio' id='childNodes' class='with-gap'> 
				<label for='childNodes'>Child Tests Only</label> 
			</div> 
			<div class='modal-footer'> 
				<a href='#!' class='modal-action modal-close waves-effect waves-green btn'>Save</a> 
			</div> 
		</div>
		<!-- /test dashboard counts setting -->
		
		<!-- filter for step status -->
		<div id='step-status-filter' class='modal bottom-sheet'> 
			<div class='modal-content'> 
				<h5>Select status</h5> 
				<input checked class='filled-in' type='checkbox' id='step-dashboard-filter-pass'> 
				<label for='step-dashboard-filter-pass'>Pass</label> 
				<br> 
				<input checked class='filled-in' type='checkbox' id='step-dashboard-filter-fail'> 
				<label for='step-dashboard-filter-fail'>Fail</label> 
				<br> 
				<input checked class='filled-in' type='checkbox' id='step-dashboard-filter-fatal'> 
				<label for='step-dashboard-filter-fatal'>Fatal</label> 
				<br> 
				<input checked class='filled-in' type='checkbox' id='step-dashboard-filter-error'> 
				<label for='step-dashboard-filter-error'>Error</label> 
				<br> 
				<input checked class='filled-in' type='checkbox' id='step-dashboard-filter-warning'> 
				<label for='step-dashboard-filter-warning'>Warning</label> 
				<br> 
				<input checked class='filled-in' type='checkbox' id='step-dashboard-filter-skip'> 
				<label for='step-dashboard-filter-skip'>Skipped</label> 
				<br> 
				<input checked class='filled-in' type='checkbox' id='step-dashboard-filter-info'> 
				<label for='step-dashboard-filter-info'>Info</label> 
				<br> 
				<input checked class='filled-in' type='checkbox' id='step-dashboard-filter-unknown'> 
				<label for='step-dashboard-filter-unknown'>Unknown</label> 
			</div>
			<div class='modal-footer'> 
				<a href='#!' class='modal-action modal-close waves-effect waves-green btn'>Save</a> 
			</div> 
		</div>
		<!-- /filter for step status -->
		
		<script src='https://cdn.rawgit.com/anshooarora/extentreports/6032d73243ba4fe4fb8769eb9c315d4fdf16fe68/cdn/extent.js' type='text/javascript'></script>

		<script>$(document).ready(function() { $('.logo span').html('ExtentReports'); });</script>
		<script>
				
            
                $(document).ready(function() {
                    
                });
            
        
		</script>
	</body>
</html>