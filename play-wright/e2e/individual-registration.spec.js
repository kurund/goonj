import { test, expect  } from '@playwright/test';
import { IndividualRegistrationPage } from '../pages/individual-registration.page'; 
import { userLogin } from '../utils';
const userDetails = require('../fixture/user-details.json');


test('submit the basic registration form', async ({ page }) => {
  const individualRegistrationPage = new IndividualRegistrationPage(page);
// Get the appended URL
  const baseUrl = individualRegistrationPage.getAppendedUrl('volunteer-registration/');
  await page.goto(baseUrl);
  await page.waitForTimeout(1000)
  await individualRegistrationPage.selectDropdownOption('#select2-chosen-2', '#s2id_autogen2_search', 'Mr.');
  individualRegistrationPage.enterFirstName(userDetails.firstName)
  await page.waitForTimeout(200); 
  individualRegistrationPage.enterLastName(userDetails.lastName)
  await page.waitForTimeout(200); 
  individualRegistrationPage.enterEmail(userDetails.email)
  await page.waitForTimeout(200); 
  await individualRegistrationPage.selectDropdownOption('#select2-chosen-4', '#s2id_autogen4_search', userDetails.country); //updated position as state were not available 
  individualRegistrationPage.enterMobileNumber(userDetails.mobileNumber)
  await page.waitForTimeout(200); 
  await individualRegistrationPage.selectDropdownOption('#select2-chosen-3', '#s2id_autogen3_search', userDetails.gender);
  individualRegistrationPage.enterStreetAddress(userDetails.streetAddress)
  await page.waitForTimeout(400); 
  individualRegistrationPage.enterCityName(userDetails.cityName)
  await page.waitForTimeout(400); 
  individualRegistrationPage.enterPostalCode(userDetails.postalCode)
  await individualRegistrationPage.selectDropdownOption('#select2-chosen-1', '#s2id_autogen1_search', userDetails.state);
  // await individualRegistrationPage.selectRadioButton(userDetails.radioOption);
  await page.waitForTimeout(2000); 
  await individualRegistrationPage.selectDropdownOption('#s2id_autogen5', '#s2id_autogen5', userDetails.activityInterested); 
  await individualRegistrationPage.selectDropdownOption('#s2id_autogen6', '#s2id_autogen6', userDetails.voluntarySkills); 
  await individualRegistrationPage.enterOtherSkills('writing')
  await individualRegistrationPage.selectDropdownOption('#s2id_autogen7', '#s2id_autogen7', userDetails.volunteerMotivation);
  await individualRegistrationPage.selectDropdownOption('#select2-chosen-8', '#s2id_autogen8_search', userDetails.volunteerHours);
  individualRegistrationPage.enterProfession(userDetails.profession)
  await page.waitForTimeout(400);  
  // await individualRegistrationPage.handleDialogMessage('Please fill all required fields.'); // This code would be required for required field message
  await individualRegistrationPage.clickSubmitButton();
  await page.waitForTimeout(1000)
});


// test('check user details on dashboard', async ({ page }) => {
//   const individualRegistrationPage = new IndividualRegistrationPage(page);
//   await userLogin(page);
//     // Click on the Volunteers tab
//   await page.click('a:has-text("Volunteers")');
//   // Wait for the submenu to appear and click on "New Signups"
//   await page.waitForSelector('a:has-text("New Signups")');
//   await page.click('a:has-text("New Signups")');
//   await page.waitForTimeout(3000) //added wait to load the data of new signup
//   //Need to add code to check the records for the user details
// });