import { test, expect } from '@playwright/test';
import { IndividualRegistrationPage } from '../pages/individual-registration.page';
import { userDetails,userFirstName, userEmail, userMobileNumber, userLogin } from '../utils.js';

async function selectContactTypeDropdown(page, dropdownSelector, optionText) {
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

async function selectRecordActivityOption(page, option) {
    // Define mapping for activity options to selectors
    const activityOptions = {
        'Meeting': 'li.crm-activity-type_0 a',
        'Phone Call': 'li.crm-activity-type_1 a',
        'Send an Email': 'li.crm-activity-type_2 a',
        'Print/Merge Document': 'li.crm-activity-type_3 a',
        'Volunteer Sign Up': 'li.crm-activity-type_4 a',
        'Induction': 'li.crm-activity-type_5 a',
        'Event Feedback - Goonj': 'li.crm-activity-type_6 a',
        'Event Feedback': 'li.crm-activity-type_7 a'
    };

    // Click on the specified activity option
    const selector = activityOptions[option];
    await page.click(selector);
}

async function clickDialogButton(page, buttonIdentifier) {
    const buttonSelectors = {
        save: 'button[data-identifier="_qf_Activity_upload"]',
        cancel: 'button[data-identifier="_qf_Activity_cancel"]'
    };
    await page.click(buttonSelectors[buttonIdentifier]);
}

async function volunteerProfileTabs(page, tabName) {
    // Map of tab identifiers to their corresponding selectors
    const tabSelectors = {
        summary: 'li#tab_summary a.ui-tabs-anchor',
        contributions: 'li#tab_contribute a.ui-tabs-anchor',
        memberships: 'li#tab_member a.ui-tabs-anchor',
        events: 'li#tab_participant a.ui-tabs-anchor',
        activities: 'li#tab_activity a.ui-tabs-anchor',
        relationships: 'li#tab_rel a.ui-tabs-anchor',
        groups: 'li#tab_group a.ui-tabs-anchor',
        tags: 'li#tab_tag a.ui-tabs-anchor',
        changeLog: 'li#tab_log a.ui-tabs-anchor',
    };

    // Click on the tab based on the selector
    await page.click(tabSelectors[tabName]);
}

test('schedule induction and update induction status as completed', async ({ page }) => {
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
  await userLogin(page);
  // Click on the Volunteers tab
  await page.click('a:has-text("Volunteers")');
  await page.click('[data-name="Search"]');
  // Click on 'Find Contacts' within the submenu
  await page.click('[data-name="Find Contacts"] a', {force : true});
  await page.waitForTimeout(2000)
//   await page.fill('input#sort_name', 'shankar_bhattathiri@hotmail.com')
  await page.fill('input#sort_name', userEmail)
  await selectContactTypeDropdown(page, '#s2id_contact_type', 'Individual');
  await clickSubmitButton(page)
  await page.waitForTimeout(2000)
  // click on view button based on email provided 
//   const emailToSearch = 'shankar_bhattathiri@hotmail.com';
  const rowSelector = `table tbody tr:has(span[title="${userEmail}"])`;
  await page.waitForTimeout(1000)
  // Click the "View" button within the identified row
  await page.click(`${rowSelector} a.view-contact`);
//   await page.waitForTimeout(2000)
//   await page.click('#crm-contact-actions-link')
//   await selectRecordActivityOption(page, 'Induction');
//   await page.waitForTimeout(2000)
//   await clickDialogButton(page, 'save');
  await page.waitForTimeout(2000)
  await page.volunteerProfileTabs(page, 'activities');
  await page.waitForTimeout(2000)
  // Create a selector to find a cell with the specified email
//   const emailSelector = `table tbody span[title="${emailToSearch}"]`;
//   const emailValue = await page.getAttribute(emailSelector, 'title');

//   // Assert that the value contains the specified email
//   expect(emailValue).toBe(emailToSearch);

});
