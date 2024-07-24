import { test, expect } from '@playwright/test';
import { userDetails, userLogin, submitVolunteerRegistrationForm, searchAndVerifyContact  } from '../utils.js';
import { VolunteerRegistrationPage} from '../pages/volunteer-registration.page.js'


test('check mandatory field validation for registration form fields', async ({ page }) => {
  const volunteerRegistrationPage = new VolunteerRegistrationPage(page);
  const volunteerUrl = volunteerRegistrationPage.getAppendedUrl('/volunteer-registration/');
  await page.goto(volunteerUrl);
  await page.waitForURL(volunteerUrl);
  await volunteerRegistrationPage.handleDialogMessage('Please fill all required fields.');
  await volunteerRegistrationPage.enterFirstName(userDetails.firstName);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.enterLastName(userDetails.lastName);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.enterLastName(userDetails.email);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.enterMobileNumber(userDetails.mobileNumber);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.selectCountry(userDetails.country);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.selectGender(userDetails.gender);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.enterStreetAddress(userDetails.streetAddress);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.selectState(userDetails.state);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.enterCityName(userDetails.cityName);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.enterPostalCode(userDetails.postalCode);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.selectActivityInterested(userDetails.activityInterested);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.selectVolunteerMotivation(userDetails.volunteerMotivation);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.selectVoluntarySkills(userDetails.voluntarySkills);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.enterOtherSkills(userDetails.otherSkills);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.selectVolunteerHours(userDetails.volunteerHours);
  await volunteerRegistrationPage.clickSubmitButton()
  await volunteerRegistrationPage.enterProfession(userDetails.profession);
  await volunteerRegistrationPage.clickSubmitButton()
});