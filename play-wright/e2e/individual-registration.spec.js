import { test, expect  } from '@playwright/test';
import { IndividualRegistrationPage } from '../pages/individual-registration.page'; 
import { userLogin } from '../utils';
const userDetails = require('../fixture/user-details.json');

// Currently we are have implemented the registration with single user delete will need to
// add functionality to delete user from admin dashboard or use faker library to generate new user in registration


test('submit the basic registration form', async ({ page }) => {
  const individualRegistrationPage = new IndividualRegistrationPage(page);
// Get the appended URL
  const baseUrl = individualRegistrationPage.getAppendedUrl('/volunteer-registration/');
  await page.goto(baseUrl);
  await page.waitForTimeout(1000)
  await individualRegistrationPage.selectTitle('Mr.');
  await individualRegistrationPage.enterFirstName(userDetails.firstName);
  await page.waitForTimeout(200);
  await individualRegistrationPage.enterLastName(userDetails.lastName);
  await page.waitForTimeout(200);
  await individualRegistrationPage.enterEmail(userDetails.email);
  await page.waitForTimeout(200);
  await individualRegistrationPage.selectCountry(userDetails.country);
  await individualRegistrationPage.enterMobileNumber(userDetails.mobileNumber);
  await page.waitForTimeout(200);
  await individualRegistrationPage.selectGender(userDetails.gender);
  await individualRegistrationPage.enterStreetAddress(userDetails.streetAddress);
  await page.waitForTimeout(200);
  await individualRegistrationPage.enterCityName(userDetails.cityName);
  await page.waitForTimeout(200);
  await individualRegistrationPage.enterPostalCode(userDetails.postalCode);
  await individualRegistrationPage.selectState(userDetails.state);
  // await individualRegistrationPage.selectRadioButton(userDetails.radioOption);
  // await page.waitForTimeout(2000);  
  await individualRegistrationPage.selectActivityInterested(userDetails.activityInterested);
  await individualRegistrationPage.selectVoluntarySkills(userDetails.voluntarySkills);
  await individualRegistrationPage.enterOtherSkills(userDetails.otherSkills);
  await individualRegistrationPage.selectVolunteerMotivation(userDetails.volunteerMotivation);
  await individualRegistrationPage.selectVolunteerHours(userDetails.volunteerHours);
  await individualRegistrationPage.enterProfession(userDetails.profession);
  await page.waitForTimeout(400);
  // await individualRegistrationPage.handleDialogMessage('Please fill all required fields.'); // This code would be required for required field message
  await individualRegistrationPage.clickSubmitButton();
  await page.waitForTimeout(1000);
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