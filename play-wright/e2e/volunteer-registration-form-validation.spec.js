import { test } from '@playwright/test';
import { userDetails } from '../utils.js';
import { VolunteerRegistrationPage} from '../pages/volunteer-registration.page.js'


test('check mandatory field validation for registration form fields', async ({ page }) => {
  const volunteerRegistrationPage = new VolunteerRegistrationPage(page);
  const volunteerUrl = volunteerRegistrationPage.getAppendedUrl('/volunteer-registration/');
  await page.goto(volunteerUrl);
  await page.waitForURL(volunteerUrl);
  await volunteerRegistrationPage.handleDialogMessage('Please fill all required fields.');
  await volunteerRegistrationPage.fillAndClearField('enterFirstName', userDetails.firstName);
  await volunteerRegistrationPage.fillAndClearField('enterLastName', userDetails.lastName);
  await volunteerRegistrationPage.fillAndClearField('enterEmail', userDetails.email);
  await volunteerRegistrationPage.fillAndClearField('enterMobileNumber', userDetails.mobileNumber);
  await volunteerRegistrationPage.selectGenderAndClear(userDetails.gender);
  await volunteerRegistrationPage.fillAndClearField('enterStreetAddress', userDetails.streetAddress);
  await volunteerRegistrationPage.fillAndClearField('enterCityName', userDetails.cityName);
  await volunteerRegistrationPage.fillAndClearField('enterPostalCode', userDetails.postalCode);
  await volunteerRegistrationPage.selectCountry(userDetails.country) 
  await volunteerRegistrationPage.selectStateAndClear(userDetails.state);
  await volunteerRegistrationPage.selectCountryAndClear(userDetails.country);
//   await volunteerRegistrationPage.selectActivityInterestedAndClear(userDetails.activityInterested);
//   await volunteerRegistrationPage.selectVolunteerMotivationAndClear(userDetails.volunteerMotivation);
//   await volunteerRegistrationPage.selectVoluntarySkillsAndClear(userDetails.voluntarySkills);
  await volunteerRegistrationPage.fillAndClearField('enterOtherSkills', userDetails.otherSkills);
  await volunteerRegistrationPage.selectVolunteerHoursAndClear(userDetails.volunteerHours)
  await volunteerRegistrationPage.fillAndClearField('enterProfession', userDetails.profession);
});

// await volunteerRegistrationPage.selectCountry(userDetails.country);
//   await volunteerRegistrationPage.enterMobileNumber(userDetails.mobileNumber);
//   await page.waitForTimeout(200);
//   await volunteerRegistrationPage.selectGender(userDetails.gender);
//   await volunteerRegistrationPage.enterStreetAddress(userDetails.streetAddress);
//   await page.waitForTimeout(200);
//   await volunteerRegistrationPage.enterCityName(userDetails.cityName);
//   await page.waitForTimeout(200);
//   await volunteerRegistrationPage.enterPostalCode(userDetails.postalCode);