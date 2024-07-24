import { test, expect } from '@playwright/test';
import { userDetails, userLogin, submitVolunteerRegistrationForm, searchAndVerifyContact  } from '../utils.js';
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
  await volunteerRegistrationPage.fillAndClearField('enterMobileNumber', userDetails.mobileNumber);
  await volunteerRegistrationPage.fillAndClearField('enterStreetAddress', userDetails.streetAddress);
  await volunteerRegistrationPage.fillAndClearField('enterCityName', userDetails.cityName);
  await volunteerRegistrationPage.fillAndClearField('enterPostalCode', userDetails.postalCode);
  await volunteerRegistrationPage.fillAndClearField('enterOtherSkills', userDetails.otherSkills);
//   await volunteerRegistrationPage.enterFirstName(userDetails.firstName);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await page.waitForTimeout(2000)
//   await volunteerRegistrationPage.enterFirstName('')
//   await volunteerRegistrationPage.enterLastName(userDetails.lastName);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await page.waitForTimeout(2000)
//   await volunteerRegistrationPage.enterLastName('')
//   await volunteerRegistrationPage.enterEmail(userDetails.email);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await page.waitForTimeout(2000)
//   await volunteerRegistrationPage.enterEmail('')
//   await volunteerRegistrationPage.enterMobileNumber(userDetails.mobileNumber);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await volunteerRegistrationPage.clearMobileNumber()
//   await volunteerRegistrationPage.selectCountry(userDetails.country);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await volunteerRegistrationPage.clearFirstName()
//   await volunteerRegistrationPage.selectGender(userDetails.gender);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await volunteerRegistrationPage.enterStreetAddress(userDetails.streetAddress);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await volunteerRegistrationPage.selectState(userDetails.state);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await volunteerRegistrationPage.enterCityName(userDetails.cityName);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await volunteerRegistrationPage.enterPostalCode(userDetails.postalCode);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await volunteerRegistrationPage.selectActivityInterested(userDetails.activityInterested);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await volunteerRegistrationPage.selectVolunteerMotivation(userDetails.volunteerMotivation);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await volunteerRegistrationPage.selectVoluntarySkills(userDetails.voluntarySkills);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await volunteerRegistrationPage.enterOtherSkills(userDetails.otherSkills);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await volunteerRegistrationPage.selectVolunteerHours(userDetails.volunteerHours);
//   await volunteerRegistrationPage.clickSubmitButton()
//   await volunteerRegistrationPage.enterProfession(userDetails.profession);
//   await volunteerRegistrationPage.clickSubmitButton()
});