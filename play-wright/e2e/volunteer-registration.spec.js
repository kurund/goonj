import { test, expect } from '@playwright/test';
import { VolunteerRegistrationPage } from '../pages/volunteer-registration.page';
import { SearchContactsPage } from '../pages/search-contact.page';
import { userDetails, userLogin } from '../utils.js';


test('submit the volunteer registration form and confirm on admin', async ({ page }) => {
  const volunteerRegistrationPage = new VolunteerRegistrationPage(page);
  const searchContactsPage = new SearchContactsPage (page);
  // Get the appended URL
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
  await page.waitForTimeout(400);
  await volunteerRegistrationPage.clickSubmitButton();
  await page.waitForTimeout(2000);  //added wait as page was taking time load 
  await userLogin(page);
  await searchContactsPage.clickSearchLabel()
  await searchContactsPage.clickFindContacts()
  await searchContactsPage.inputUserNameOrEmail(userDetails.email)
  await searchContactsPage.selectContactType('Individual');
  await searchContactsPage.clickSearchButton();
  await page.waitForTimeout(2000) //added wait as page was taking time load 
  const contactRowSelector = `table tbody tr:has(span[title="${userDetails.email}"])`;
  await page.waitForTimeout(1000)
  expect(contactRowSelector).toContain(userDetails.email)
  await page.waitForTimeout(1000)
});



