import { test, expect } from '@playwright/test';
import { VolunteerRegistrationPage } from '../pages/volunteer-registration.page';
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
  const volunteerRegistrationPage = new VolunteerRegistrationPage(page);

  // Get the appended URL
  const vounteerURl = volunteerRegistrationPage.getAppendedUrl('/volunteer-registration/');
  await page.goto(vounteerURl);
  expect(page.url()).toContain('/volunteer-registration');
  await page.waitForTimeout(1000);
  await volunteerRegistrationPage.selectTitle(userDetails.nameInital);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterFirstName(userFirstName);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterLastName(userDetails.lastName);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterEmail(userEmail);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.selectCountry(userDetails.country);
  await volunteerRegistrationPage.enterMobileNumber(userMobileNumber);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.selectGender(userDetails.gender);
  await volunteerRegistrationPage.enterStreetAddress(userDetails.streetAddress);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterCityName(userDetails.cityName);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterPostalCode(userDetails.postalCode);
  await volunteerRegistrationPage.selectState(userDetails.state);
  await volunteerRegistrationPage.selectActivityInterested(userDetails.activityInterested);
  await volunteerRegistrationPage.selectVoluntarySkills(userDetails.voluntarySkills);
  await volunteerRegistrationPage.enterOtherSkills(userDetails.otherSkills);
  await volunteerRegistrationPage.selectVolunteerMotivation(userDetails.volunteerMotivation);
  await volunteerRegistrationPage.selectVolunteerHours(userDetails.volunteerHours);
  await volunteerRegistrationPage.enterProfession(userDetails.profession);
  await page.waitForTimeout(400);
  // // await volunteerRegistrationPage.handleDialogMessage('Please fill all required fields.'); // This code would be required for required field message
  await volunteerRegistrationPage.clickSubmitButton();
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



