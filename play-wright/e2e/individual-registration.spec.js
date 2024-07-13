import { test, expect } from '@playwright/test';
import { IndividualRegistrationPage } from '../pages/individual-registration.page';
import { userDetails,userFirstName, userEmail, userMobileNumber, userLogin } from '../utils.js';

async function selectOptionFromDropdown(page, dropdownSelector, optionText) {
  // Click to open the dropdown
  await page.click(`${dropdownSelector} .select2-choice`);

  // Select the desired option
  const option = await page.locator(`.select2-result-label:has-text("${optionText}")`);
  await option.click();
}

async function clickSubmitButton(page) {
  // Locate the submit button by its role and click it
  await page.getByRole('button', { name: /search/i }).click();
}

test('submit the volunteer registration form and confirm on admin', async ({ page }) => {
  const individualRegistrationPage = new IndividualRegistrationPage(page);

  // Get the appended URL
  const vounteerURl = individualRegistrationPage.getAppendedUrl('/volunteer-registration/');
  await page.goto(vounteerURl);
  await page.waitForTimeout(1000);
  await individualRegistrationPage.selectTitle(userDetails.nameInital);
  await page.waitForTimeout(200);
  await individualRegistrationPage.enterFirstName(userFirstName);
  await page.waitForTimeout(200);
  await individualRegistrationPage.enterLastName(userDetails.lastName);
  await page.waitForTimeout(200);
  await individualRegistrationPage.enterEmail(userEmail);
  await page.waitForTimeout(200);
  await individualRegistrationPage.selectCountry(userDetails.country);
  await individualRegistrationPage.enterMobileNumber(userMobileNumber);
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
  // // await individualRegistrationPage.handleDialogMessage('Please fill all required fields.'); // This code would be required for required field message
  await individualRegistrationPage.clickSubmitButton();
  await page.waitForTimeout(2000);
  console.log(`Registered email: ${userEmail}`);
  console.log(`Registered mobile number: ${userMobileNumber}`);
  await userLogin(page);
  // Click on the Volunteers tab
  await page.click('a:has-text("Volunteers")');
  await page.click('[data-name="Search"]');
  // Click on 'Find Contacts' within the submenu
  await page.click('[data-name="Find Contacts"] a', {force : true});
  await page.waitForTimeout(2000)
  await page.fill('input#sort_name', email)
  // await page.fill('input#sort_name', userFirstName)
  await selectOptionFromDropdown(page, '#s2id_contact_type', 'Individual');
  await clickSubmitButton(page)
  await page.waitForTimeout(2000)
  // You can add further assertions or actions here
  // Example: verify the selected value
  // const selectedValue = await page.locator('#s2id_contact_type .select2-chosen').innerText();
  // expect(selectedValue).toBe('Individual');
});


// import { test, expect  } from '@playwright/test';
// import { IndividualRegistrationPage } from '../pages/individual-registration.page'; 
// import { userLogin } from '../utils';
// const userDetails = require('../fixture/user-details.json');


// test('submit the basic registration form', async ({ page }) => {
//   const individualRegistrationPage = new IndividualRegistrationPage(page);
// // Get the appended URL
//   const baseUrl = individualRegistrationPage.getAppendedUrl('/volunteer-registration/');
//   await page.goto(baseUrl);
//   await page.waitForTimeout(1000)
//   await individualRegistrationPage.selectTitle('Mr.');
//   await individualRegistrationPage.enterFirstName(userDetails.firstName);
//   await page.waitForTimeout(200);
//   await individualRegistrationPage.enterLastName(userDetails.lastName);
//   await page.waitForTimeout(200);
//   await individualRegistrationPage.enterEmail(userDetails.email);
//   await page.waitForTimeout(200);
//   await individualRegistrationPage.selectCountry(userDetails.country);
//   await individualRegistrationPage.enterMobileNumber(userDetails.mobileNumber);
//   await page.waitForTimeout(200);
//   await individualRegistrationPage.selectGender(userDetails.gender);
//   await individualRegistrationPage.enterStreetAddress(userDetails.streetAddress);
//   await page.waitForTimeout(200);
//   await individualRegistrationPage.enterCityName(userDetails.cityName);
//   await page.waitForTimeout(200);
//   await individualRegistrationPage.enterPostalCode(userDetails.postalCode);
//   await individualRegistrationPage.selectState(userDetails.state);
//   // await individualRegistrationPage.selectRadioButton(userDetails.radioOption);
//   // await page.waitForTimeout(2000);  
//   await individualRegistrationPage.selectActivityInterested(userDetails.activityInterested);
//   await individualRegistrationPage.selectVoluntarySkills(userDetails.voluntarySkills);
//   await individualRegistrationPage.enterOtherSkills(userDetails.otherSkills);
//   await individualRegistrationPage.selectVolunteerMotivation(userDetails.volunteerMotivation);
//   await individualRegistrationPage.selectVolunteerHours(userDetails.volunteerHours);
//   await individualRegistrationPage.enterProfession(userDetails.profession);
//   await page.waitForTimeout(400);
//   // await individualRegistrationPage.handleDialogMessage('Please fill all required fields.'); // This code would be required for required field message
//   await individualRegistrationPage.clickSubmitButton();
//   await page.waitForTimeout(1000);
// });

// Currently we are have implemented the registeration with single user delete will need to
// add functionality to delete user from admin dashboard or use faker library to generate new user inr
