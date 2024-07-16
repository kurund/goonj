import { test, expect } from '@playwright/test';
import { VolunteerRegistrationPage } from '../pages/volunteer-registration.page';
import { userDetails, userEmail, userLogin } from '../utils.js';
import { SearchContactsPage } from '../pages/search-contact.page';
import { VolunteerProfilePage } from '../pages/volunteer-profile.page';

test('schedule induction and update induction status as completed', async ({ page }) => {
  const volunteerRegistrationPage = new VolunteerRegistrationPage(page);
  const searchContactsPage = new SearchContactsPage (page);
  const volunteerProfilePage = new VolunteerProfilePage(page);
  // Get the appended URL
  const vounteerURl = volunteerRegistrationPage.getAppendedUrl('/volunteer-registration/');
  await page.goto(vounteerURl);
  await page.waitForTimeout(1000);
  await volunteerRegistrationPage.selectTitle(userDetails.nameInital);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterFirstName(userDetails.firstName);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterLastName(userDetails.lastName);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterEmail(userEmail);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.selectCountry(userDetails.country);
  await volunteerRegistrationPage.enterMobileNumber(userDetails.mobileNumber);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.selectGender(userDetails.gender);
  await volunteerRegistrationPage.enterStreetAddress(userDetails.streetAddress);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterCityName(userDetails.cityName);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterPostalCode(userDetails.postalCode);
  await volunteerRegistrationPage.selectState(userDetails.state);
  // await volunteerRegistrationPage.selectRadioButton(userDetails.radioOption);
  // await page.waitForTimeout(2000);
  await volunteerRegistrationPage.selectActivityInterested(userDetails.activityInterested);
  await volunteerRegistrationPage.selectVoluntarySkills(userDetails.voluntarySkills);
  await volunteerRegistrationPage.enterOtherSkills(userDetails.otherSkills);
  await volunteerRegistrationPage.selectVolunteerMotivation(userDetails.volunteerMotivation);
  await volunteerRegistrationPage.selectVolunteerHours(userDetails.volunteerHours);
  await volunteerRegistrationPage.enterProfession(userDetails.profession);
  // // await volunteerRegistrationPage.handleDialogMessage('Please fill all required fields.'); // This code would be required for required field message
  await volunteerRegistrationPage.clickSubmitButton();
  await page.waitForTimeout(2000);
  await userLogin(page);
  await searchContactsPage.clickSearchLabel()
  await searchContactsPage.clickFindContacts()
  await searchContactsPage.inputUserNameOrEmail(userEmail)
  await searchContactsPage.selectContactType('Individual');
  await searchContactsPage.clickSearchButton();
  await page.waitForTimeout(2000)
  page.locator('a.view-contact').click({force: true})
//commented below code as flow is modified but can be used in other scenarios
//   await page.click('#crm-contact-actions-link')
//   await selectRecordActivityOption(page, 'Induction');
//   await page.waitForTimeout(2000)
//   await clickDialogButton(page, 'save');
//   await page.waitForTimeout(2000)
  await volunteerProfilePage.volunteerProfileTabs('activities');
  await page.waitForTimeout(2000)
  await volunteerProfilePage.clickActivitiesActionButton('Induction', 'Scheduled', 'Edit');
  await page.waitForTimeout(4000)
  await volunteerProfilePage.selectActivityStatusValue('Completed');
  await page.waitForTimeout(2000)
  await volunteerProfilePage.clickDialogButton('save');
  await page.click('a:has-text("Volunteers")');
  await page.waitForTimeout(3000)
  await volunteerProfilePage.clickVolunteerSuboption('Active')
  await page.waitForTimeout(2000)
  const activeVolunteerRowSelector = `table tbody tr:has(span[title="${userEmail}"])`;
  await page.waitForTimeout(1000)
  expect(activeVolunteerRowSelector).toContain(userEmail)

});
