<?php
// Retrieve the recentCamp data from the session
$recentCampData = $_SESSION['recentCampData'] ?? null;
$contactId = $_SESSION['contactId'] ?? null;

$redirectBaseUrl = get_home_url() . "/collection-camp-form/#?";

$queryParams = [
	'source_contact_id' => $recentCampData['source_contact_id'] ?? '',
	'Collection_Camp_Intent.District' => $recentCampData['custom_72'] ?? '',
	'Collection_Camp_Intent.State' => $recentCampData['custom_71'] ?? '',
	'Collection_Camp_Intent.Start_Date' => $recentCampData['custom_73'] ?? '',
	'Collection_Camp_Intent.End_Date' => $recentCampData['custom_74'] ?? '',
	'Collection_Camp_Intent.Location_Area_of_camp' => $recentCampData['custom_69'] ?? ''
];

$redirectUrl = $redirectBaseUrl . http_build_query($queryParams);
$noDetailsRedirectUrl = get_home_url() . "/collection-camp-form/#?" . http_build_query([
	'source_contact_id' => $contactId
]);

?>

<div class="ml-25">
	<button class="button button-primary w-520 mb-12 border-none font-sans fz-16" onclick="window.location.href='<?php echo esc_url($redirectUrl); ?>';">
		Yes, use details from last camp
	</button>
	<button class="button button-primary w-520 border-none font-sans fz-16" onclick="window.location.href='<?php echo esc_url($noDetailsRedirectUrl); ?>';">
		No, the details are different
	</button>
</div>

<?php
?>
