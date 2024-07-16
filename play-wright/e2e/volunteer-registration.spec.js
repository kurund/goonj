import { test, expect } from '@playwright/test';
import { IndividualRegistrationPage } from '../pages/individual-registration.page';
import { userDetails,userFirstName, userEmail, userMobileNumber, userLogin } from '../utils.js';

async function selectContactTypeDropdown(page, dropdownSelector, optionText) {
  await page.click(`${dropdownSelector} .select2-choice`);
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
  expect(page.url()).toContain('/volunteer-registration');
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
  await individualRegistrationPage.selectActivityInterested(userDetails.activityInterested);
  await individualRegistrationPage.selectVoluntarySkills(userDetails.voluntarySkills);
  await individualRegistrationPage.enterOtherSkills(userDetails.otherSkills);
  await individualRegistrationPage.selectVolunteerMotivation(userDetails.volunteerMotivation);
  await individualRegistrationPage.selectVolunteerHours(userDetails.volunteerHours);
  await individualRegistrationPage.enterProfession(userDetails.profession);
  await page.waitForTimeout(400);
  // // await individualRegistrationPage.handleDialogMessage('Please fill all required fields.'); // This code would be required for required field message
  await individualRegistrationPage.clickSubmitButton();
  await page.waitForTimeout(2000);  //added wait as page was taking time load 
  await userLogin(page);
  // Click on the Volunteers tab
  await page.click('a:has-text("Volunteers")');
  await page.click('[data-name="Search"]');
  // Click on 'Find Contacts' within the submenu
  await page.click('[data-name="Find Contacts"] a', {force : true});
  await page.waitForTimeout(2000)
  await page.fill('input#sort_name', userEmail)
  await selectContactTypeDropdown(page, '#s2id_contact_type', 'Individual');
  await clickSubmitButton(page)
  await page.waitForTimeout(2000)
  const contactRowSelector = `table tbody tr:has(span[title="${userEmail}"])`;
  await page.waitForTimeout(1000)
  expect(contactRowSelector).toContain(userEmail)
  await page.waitForTimeout(1000)
});



