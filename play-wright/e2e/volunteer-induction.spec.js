import { test, expect } from '@playwright/test';
import { VolunteerRegistrationPage } from '../pages/volunteer-registration.page';
import { userDetails, userLogin } from '../utils.js';
import { SearchContactsPage } from '../pages/search-contact.page';
import { VolunteerProfilePage } from '../pages/volunteer-profile.page';

test('schedule induction and update induction status as completed', async ({ page }) => {
  const volunteerRegistrationPage = new VolunteerRegistrationPage(page);
  const searchContactsPage = new SearchContactsPage (page);
  const volunteerProfilePage = new VolunteerProfilePage(page);
  const vounteerURl = volunteerRegistrationPage.getAppendedUrl('/volunteer-registration/');
  await page.goto(vounteerURl);
  await page.waitForURL(vounteerURl)
  await volunteerRegistrationPage.selectTitle(userDetails.nameInitial);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterFirstName(userDetails.firstName);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterLastName(userDetails.lastName);
  await page.waitForTimeout(200);
  await volunteerRegistrationPage.enterEmail(userDetails.email);
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
  await volunteerRegistrationPage.selectActivityInterested(userDetails.activityInterested);
  await volunteerRegistrationPage.selectVoluntarySkills(userDetails.voluntarySkills);
  await volunteerRegistrationPage.enterOtherSkills(userDetails.otherSkills);
  await volunteerRegistrationPage.selectVolunteerMotivation(userDetails.volunteerMotivation);
  await volunteerRegistrationPage.selectVolunteerHours(userDetails.volunteerHours);
  await volunteerRegistrationPage.enterProfession(userDetails.profession);
  await volunteerRegistrationPage.clickSubmitButton();
  await page.waitForTimeout(2000);
  await userLogin(page);
  await searchContactsPage.clickSearchLabel()
  await searchContactsPage.clickFindContacts()
  await searchContactsPage.inputUserNameOrEmail(userDetails.email)
  await searchContactsPage.selectContactType('Individual');
  await searchContactsPage.clickSearchButton();
  await page.waitForTimeout(2000)
  page.locator('a.view-contact').click({force: true})
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
  const activeVolunteerRowSelector = `table tbody tr:has(span[title="${userDetails.email}"])`;
  await page.waitForTimeout(1000)
  expect(activeVolunteerRowSelector).toContain(userDetails.email)

});
