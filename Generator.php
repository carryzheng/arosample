<?php

require_once 'autoload.php';


$fileGen = new AroFile();
$imageGen = new AroImage();
$personGen = new ContactPerson();
$companyGen = new ContactCompany();
$companyContactDetailGen = new CompanyContactDetail();
$companyAddressGen = new CompanyAddress();
$contactGen = new Contact();
$contactDetailGen = new ContactDetail();
$contactAddressGen = new ContactAddress();
$userGen = new AroUser();
$userSiteMapGen = new UserSiteMap();
$contactMemberGen = new ContactMember();
$contactConsultantGen = new ContactConsultant();
$contactAgencyGen = new ContactAgency();
$contactOfficeGen = new ContactOffice();
$officeMemberMapGen = new ContactOfficeMemberMap();
$contactGroupMapGen = new ContactGroupMap();
$memberGroupGen = new MemberGroup();
$buyerAlertGen = new BuyerAlert();
$tenantAlertGen = new TenantAlert();
$propertyGen = new Property();
$listingGen = new Listing();
$ofiGen = new OFI();
$propertyViewGen = new PropertyView();
$communicationGen = new Communication();
$listingConsultantMapGen = new ListingConsultantMap();
$trailGen = new Trail();
$documentGen = new Document();
$trailTaskTemplateGen = new TraiilTaskTemplate();
$customerListingSavedMapGen = new CustomerListingSavedMap();
$cmsWebsiteGen = new CmsWebsite();
$cmsPageGen = new CmsPage();
$cmsSiteMapGen = new CmsSiteMap();
$cmsPageAccessGen = new CmsPageAccess();
$cmsSitemapItemGen = new CmsSiteMapItem();
$contractGen = new Contract();
$ContractChecklistGen = new ContractChecklist();
$ContractCommissionGen = new ContractCommission();
$contractDepositGen = new ContractDeposit();
$contractExpenseGen = new ContractExpense();
$contractUnitGen = new ContractUnit();
$listingSaleGen = new ListingSale();

$fileName = 'sample.sql';
$fileBreak = "\n";
$baseCount = 1000;
$start = 0;
if (isset($argv[1])) {
    $start = intval($argv[1]);
}
$files = $fileGen->getFiles();
$images = $imageGen->getImages();

function consoleEcho($msg)
{
  $consoleBreak = chr(10);
  echo "$msg$consoleBreak";
}

function echoBreakLine()
{
  consoleEcho('--------------------------------');
}

$file = $start == 0 ? fopen($fileName, 'w') : fopen($fileName, 'a');
if (!$file) {
  consoleEcho("open file: $fileName failed.");
  exit();
}

$sql = 'SET FOREIGN_KEY_CHECKS=0;';
fwrite($file, "$sql$fileBreak");

$fileCount = 1;
$imageCount = 1;
if ($start === 0) {
    // Use database
    $sql = 'USE aro_software_dev;';
    fwrite($file, "$sql$fileBreak");
    // file
    consoleEcho('file starting...');
    $sql = $fileGen->buildInsertSql(array(
      'count' => $fileCount,
      'start' => 0
    ));
    fwrite($file, "$sql$fileBreak");
    consoleEcho('file end.');
    echoBreakLine();

    // image
    consoleEcho('image starting...');
    $sql = $imageGen->buildInsertSql(array(
      'count' => $fileCount,
      'start' => 0
    ));
    fwrite($file, "$sql$fileBreak");
    consoleEcho('image end.');
    echoBreakLine();
}

// contact person
$personCount = floor($baseCount * rand(50, 100) / 100);
consoleEcho('contact_person starting...');
$sql = $personGen->buildInsertSql(array(
  'count' => $personCount,
  'start' => $start
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contact_person end.');
echoBreakLine();

// contact company
$companyCount = floor($baseCount * rand(50, 100) / 100);
consoleEcho('contact_company starting...');
$sql = $companyGen->buildInsertSql(array(
  'count' => $companyCount,
  'start' => $start
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contact_company end.');
echoBreakLine();

// company_contact_detail
$companyContactDetailCount = $companyCount * 4;
consoleEcho('company_contact_detail starting...');
$sql = $companyContactDetailGen->buildInsertSql(array(
  'count' => $companyContactDetailCount,
  'start' => $start,
  'first' => $start * 4
));
fwrite($file, "$sql$fileBreak");
consoleEcho('company_contact_detail end.');
echoBreakLine();

// company_address
$companyAddressCount = rand($companyCount, $companyCount * 2);
consoleEcho('company_address starting...');
$sql = $companyAddressGen->buildInsertSql(array(
  'count' => $companyAddressCount,
  'start' => $start,
  'first' => $start * 2,
  'companyCount' => $companyCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('company_address end.');
echoBreakLine();

// contact
$contactCount = $baseCount;
consoleEcho('contact starting...');
$sql = $contactGen->buildInsertSql(array(
  'count' => $contactCount,
  'start' => $start,
  'companyCount' => $companyCount,
  'personCount' => $personCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contact end.');
echoBreakLine();

// contact_detail
$contactDetailCount = rand($baseCount, $baseCount * 2);
consoleEcho('contact_detail starting...');
$sql = $contactDetailGen->buildInsertSql(array(
  'count' => $contactDetailCount,
  'start' => $start,
  'first' => $start * 2,
  'contactCount' => $contactCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contact_detail end.');
echoBreakLine();

// contact_address
$contactAddressCount = rand($contactCount, $contactCount * 2);
consoleEcho('contact_address starting...');
$sql = $contactAddressGen->buildInsertSql(array(
  'count' => $contactAddressCount,
  'start' => $start,
  'first' => $start * 2,
  'contactCount' => $contactCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contact_address end.');
echoBreakLine();

// contact_member
$contactMemberCount = floor($baseCount * rand(30, 60) / 100);
consoleEcho('contact_member starting...');
$sql = $contactMemberGen->buildInsertSql(array(
  'count' => $contactMemberCount,
  'start' => $start,
  'contactCount' => $contactCount,
  'unArchived' => $contactGen->getUnArchivedContact()
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contact_member end.');
echoBreakLine();

// user
$employedMembers = $contactMemberGen->getEmployedMembers();
$userCount = count($employedMembers);
consoleEcho('user starting...');
$sql = $userGen->buildInsertSql(array(
  'count' => $userCount,
  'start' => $start,
  'employedMembers' => $employedMembers
));
fwrite($file, "$sql$fileBreak");
consoleEcho('user end.');
echoBreakLine();

if ($start === 0) {
  $sql = "UPDATE `aro_software_dev`.`contact` LEFT JOIN `aro_software_dev`.`user` ON `user`.`contact_id`=`contact`.`id` SET `archived`=0 WHERE `user`.`id`=1;";
  fwrite($file, "$sql$fileBreak");
}

// user_site_map
$userSiteMapCount = $userCount;
consoleEcho('user_site_map starting...');
$sql = $userSiteMapGen->buildInsertSql(array(
  'count' => $userSiteMapCount,
  'start' => $start
));
fwrite($file, "$sql$fileBreak");
consoleEcho('user_site_map end.');
echoBreakLine();

// contact_consultant
$contactConsultantCount = $contactMemberCount;
$employedMemberIds = $contactMemberGen->getEmployedMemberIds();
consoleEcho('contact_consultant starting...');
$sql = $contactConsultantGen->buildInsertSql(array(
  'count' => $contactConsultantCount,
  'start' => $start,
  'employedMemberIds' => $employedMemberIds
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contact_consultant end.');
echoBreakLine();

// contact_agency
$contactAgencyCount = $companyCount;
consoleEcho('contact_agency starting...');
$sql = $contactAgencyGen->buildInsertSql(array(
  'count' => $contactAgencyCount,
  'start' => $start,
  'contactCount' => $contactCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contact_agency end.');
echoBreakLine();

// contact_office
$contactOfficeCount = $companyCount;
consoleEcho('contact_office starting...');
$sql = $contactOfficeGen->buildInsertSql(array(
  'count' => $contactOfficeCount,
  'start' => $start,
  'companyCount' => $companyCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contact_office end.');
echoBreakLine();

// contact_office_member_map
$officeMemberMapCount = $contactOfficeCount;
consoleEcho('contact_office_member_map starting...');
$sql = $officeMemberMapGen->buildInsertSql(array(
  'count' => $officeMemberMapCount,
  'start' => $start,
  'officeCount' => $contactOfficeCount,
  'memberCount' => $contactMemberCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contact_office_member_map end.');
echoBreakLine();

// contact_group_map
$contactGroupMapCount = floor($contactCount * rand(60, 100) / 100);
consoleEcho('contact_group_map starting...');
$sql = $contactGroupMapGen->buildInsertSql(array(
  'count' => $contactGroupMapCount,
  'start' => $start,
  'contactCount' => $contactCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contact_group_map end.');
echoBreakLine();

// member_group_map
$memberGroupCount = floor($contactMemberCount * rand(60, 100) / 100);
consoleEcho('member_group_map starting...');
$sql = $memberGroupGen->buildInsertSql(array(
  'count' => $memberGroupCount,
  'start' => $start,
  'memberCount' => $contactMemberCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('member_group_map end.');
echoBreakLine();

// buyer_alert
$buyerAlertCount = floor($baseCount * rand(30, 60) / 100);
consoleEcho('buyer_alert starting...');
$sql = $buyerAlertGen->buildInsertSql(array(
  'count' => $buyerAlertCount,
  'start' => $start,
  'contactCount' => $contactCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('buyer_alert end.');
echoBreakLine();

// tenant_alert
$tenantAlertCount = floor($baseCount * rand(30, 60) / 100);
consoleEcho('tenant_alert starting...');
$sql = $tenantAlertGen->buildInsertSql(array(
  'count' => $tenantAlertCount,
  'start' => $start,
  'contactCount' => $contactCount,
  'agencyCount' => $contactAgencyCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('tenant_alert end.');
echoBreakLine();

// property
$propertyCount = $baseCount;
consoleEcho('property starting...');
$sql = $propertyGen->buildInsertSql(array(
  'count' => $propertyCount,
  'start' => $start,
  'contactCount' => $contactCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('property end.');
echoBreakLine();

// listing
$listingCount = $baseCount;
consoleEcho('listing starting...');
$sql = $listingGen->buildInsertSql(array(
  'count' => $listingCount,
  'start' => $start
));
fwrite($file, "$sql$fileBreak");
consoleEcho('listing end.');
echoBreakLine();

// open_for_inspection
$ofiCount = floor($baseCount * rand(30, 60) / 100);
consoleEcho('open_for_inspection starting...');
$sql = $ofiGen->buildInsertSql(array(
  'count' => $ofiCount,
  'start' => $start,
  'contactCount' => $contactCount,
  'listingCount' => $listingCount,
  'consultantCount' => $contactConsultantCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('open_for_inspection end.');
echoBreakLine();

// property_view
$propertyViewCount = floor($ofiCount * rand(80, 100) / 100);
consoleEcho('open_for_inspection starting...');
$sql = $propertyViewGen->buildInsertSql(array(
  'count' => $propertyViewCount,
  'start' => $start,
  'contactCount' => $contactCount,
  'listings' => $ofiGen->getListings()
));
fwrite($file, "$sql$fileBreak");
consoleEcho('property_view end.');
echoBreakLine();

// communication
$communicationCount = floor($contactMemberCount * rand(80, 100) / 100);
consoleEcho('communication starting...');
$sql = $communicationGen->buildInsertSql(array(
  'count' => $communicationCount,
  'start' => $start,
  'contactCount' => $contactCount,
  'memberCount' => $contactMemberCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('communication end.');
echoBreakLine();

// listing_consultant_map
$listingConsultantMapCount = floor($contactMemberCount * rand(80, 100) / 100);
consoleEcho('listing_consultant_map starting...');
$sql = $listingConsultantMapGen->buildInsertSql(array(
  'count' => $listingConsultantMapCount,
  'start' => $start,
  'consultantCount' => $contactConsultantCount,
  'listingCount' => $listingCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('listing_consultant_map end.');
echoBreakLine();

// trails
$employedMemberIds = $contactMemberGen->getEmployedMemberIds();
$employedCons = $contactConsultantGen->getEmployedCons();
$trailCount = floor($contactCount * rand(30, 60) / 100);
consoleEcho('trails starting...');
$sql = $trailGen->buildInsertSql(array(
  'count' => $trailCount,
  'start' => $start,
  'consultants' => $employedCons,
  'contactCount' => $contactCount,
  'members' => $employedMemberIds
));
fwrite($file, "$sql$fileBreak");
consoleEcho('trails end.');
echoBreakLine();

// document
$documentCount = floor($baseCount * rand(10, 20) / 100);
consoleEcho('document starting...');
$sql = $documentGen->buildInsertSql(array(
  'count' => $documentCount,
  'start' => $start,
  'contactCount' => $contactCount,
  'listingCount' => $listingCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('document end.');
echoBreakLine();

// trail_task_templates
$trailTaskTemplateCount = floor($trailCount * rand(70, 90) / 100);
consoleEcho('trail_task_templates starting...');
$sql = $trailTaskTemplateGen->buildInsertSql(array(
  'count' => $trailTaskTemplateCount,
  'start' => $start,
  'contactMemberMap' => $contactMemberGen->getContactMemberMap(),
  'trailContactMap' => $trailGen->getTrailContactMap(),
  'trailCount' => $trailCount,
  'documentCount' => $documentCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('trail_task_templates end.');
echoBreakLine();

// customer_listing_saved_map
$customerListingSavedMapCount = floor($contactCount * rand(30, 50) / 100);
consoleEcho('customer_listing_saved_map starting...');
$sql = $customerListingSavedMapGen->buildInsertSql(array(
  'count' => $customerListingSavedMapCount,
  'start' => $start
));
fwrite($file, "$sql$fileBreak");
consoleEcho('customer_listing_saved_map end.');
echoBreakLine();

// /**                      contract                                 **/

// cms_website
$cmsWebsiteCount = floor($baseCount * rand(10, 15) / 100);
consoleEcho('cms_website starting...');
$sql = $cmsWebsiteGen->buildInsertSql(array(
  'count' => $cmsWebsiteCount,
  'start' => $start
));
fwrite($file, "$sql$fileBreak");
consoleEcho('cms_website end.');
echoBreakLine();

// cms_sitemap
$cmsSitemapCount = ($cmsWebsiteCount * 4);
consoleEcho('cms_sitemap starting...');
$sql = $cmsSiteMapGen->buildInsertSql(array(
  'count' => $cmsSitemapCount,
  'start' => $start,
  'first' => $start * 4,
  'websiteCount' => $cmsWebsiteCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('cms_sitemap end.');
echoBreakLine();

// cms_page
$cmsPageCount = ($cmsWebsiteCount * 4);
consoleEcho('cms_page starting...');
$sql = $cmsPageGen->buildInsertSql(array(
  'count' => $cmsPageCount,
  'start' => $start,
  'first' => $start * 4,
  'websiteCount' => $cmsWebsiteCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('cms_page end.');
echoBreakLine();

// cms_page_access
$cmsPageAccessCount = ($cmsPageCount * 4);
consoleEcho('cms_page_access starting...');
$sql = $cmsPageAccessGen->buildInsertSql(array(
  'count' => $cmsPageAccessCount,
  'start' => $start * 4,
  'first' => $start * 16,
  'restrictedPages' => $cmsPageGen->getRestrictedPages()
));
fwrite($file, "$sql$fileBreak");
consoleEcho('cms_page_access end.');
echoBreakLine();

// cms_sitemap_item
$cmsSitemapItemCount = ($cmsSitemapCount * 4);
consoleEcho('cms_sitemap_item starting...');
$sql = $cmsSitemapItemGen->buildInsertSql(array(
  'count' => $cmsSitemapItemCount,
  'start' => $start * 4,
  'first' => $start * 16,
  'sitemapCount' => $cmsSitemapCount,
  'sitePageMap' => $cmsPageGen->getWebsitePageMap(),
  'webSiteMap' => $cmsSiteMapGen->getWebSiteMap()
));
fwrite($file, "$sql$fileBreak");
consoleEcho('cms_sitemap_item end.');
echoBreakLine();

// contract
$contractCount = floor($listingCount * rand(30, 60) / 100);
consoleEcho('contract starting...');
$sql = $contractGen->buildInsertSql(array(
  'count' => $contractCount,
  'start' => $start,
  'listingCount' => $listingCount,
  'contactOfficeCount' => $contactOfficeCount,
  'contactMemberCount' => $contactMemberCount,
  'contactCount' => $contactCount,
  'companyCount' => $companyCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contract end.');
echoBreakLine();

// contract_checklist
$contractChecklistCount = $contractCount;
consoleEcho('contract_checklist starting...');
$sql = $ContractChecklistGen->buildInsertSql(array(
  'count' => $contractChecklistCount,
  'start' => $start,
  'contactAgencyCount' => $contactAgencyCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contract_checklist end.');
echoBreakLine();

// contract_commission
$contractCommissionCount = $contractCount * 4;
consoleEcho('contract_commission starting...');
$sql = $ContractCommissionGen->buildInsertSql(array(
  'count' => $contractChecklistCount,
  'start' => $start,
  'first' => $start * 4,
  'contractCount' => $contractCount,
  'contactMemberCount' => $contactMemberCount,
  'contactCount' => $contactCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contract_commission end.');
echoBreakLine();

// contract_deposit
$contractDepositCount = $contractCount * 2;
consoleEcho('contract_deposit starting...');
$sql = $contractDepositGen->buildInsertSql(array(
  'count' => $contractDepositCount,
  'start' => $start,
  'first' => $start * 2,
  'contractCount' => $contractCount,
  'contactCount' => $contactCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contract_deposit end.');
echoBreakLine();

// contract_expense
$contractExpenseCount = $contractCount * 3;
consoleEcho('contract_expense starting...');
$sql = $contractExpenseGen->buildInsertSql(array(
  'count' => $contractExpenseCount,
  'start' => $start,
  'first' => $start * 3,
  'contractCount' => $contractCount,
  'contactMemberCount' => $contactMemberCount
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contract_expense end.');
echoBreakLine();

// contract_unit
$contractUnitCount = $contractCount;
consoleEcho('contract_unit starting...');
$sql = $contractUnitGen->buildInsertSql(array(
  'count' => $contractUnitCount,
  'start' => $start
));
fwrite($file, "$sql$fileBreak");
consoleEcho('contract_unit end.');
echoBreakLine();

// listing_sale
$listingSaleCount = $listingCount;
consoleEcho('listing_sale starting...');
$sql = $listingSaleGen->buildInsertSql(array(
  'count' => $listingSaleCount,
  'start' => $start
));
fwrite($file, "$sql$fileBreak");
consoleEcho('listing_sale end.');
echoBreakLine();

$sql = 'SET FOREIGN_KEY_CHECKS=1;';
fwrite($file, "$sql$fileBreak$fileBreak");
fclose($file);