import { test, expect } from '@playwright/test';
import { userDetails, userLogin, submitVolunteerRegistrationForm, searchAndVerifyContact  } from '../utils.js';
import { VolunteerProfilePage } from '../pages/volunteer-profile.page';

async function selectVolunteerSuboption(page, option) {
  // Click the dropdown to display the options
  await page.click('.select2-choice');
  // Click on the desired option based on data-name attribute
  await page
    .locator('ul[role="group"] li')
    .filter({ has: page.locator(`:text("${option}")`) })
    .click();
}

async function selectDropdownOption(page, dropdownSelector, optionText) {
  // Click on the dropdown to open the options list
  await page.click(dropdownSelector);

  // Type the option text in the search box
  await page.fill('.select2-drop-active .select2-input', optionText);

  // Wait for the options to be populated based on the search input
  await page.waitForTimeout(500);

  // Select the option based on the provided text using a different selector
  const optionSelector = `.select2-drop-active .select2-results li div:has-text("${optionText}")`;
  await page.click(optionSelector);
}
// async function addedVolunteerSuboption(page, dropdownSelector, dataName) {
//   await page.click(dropdownSelector);
//   // await page.waitForSelector('.sm-nowrap');
//   const optionSelector = `.sm-nowrap li[data-name="${dataName}"]`;
//   await page.waitForSelector(optionSelector);
//   await page.click(optionSelector);
// }

test('update status of volunteer from active to Lead', async ({ page }) => {
  const volunteerProfilePage = new VolunteerProfilePage(page);
  const contactType = 'Individual'
  await submitVolunteerRegistrationForm(page, userDetails);
  await page.waitForTimeout(2000)
  await userLogin(page);
  await searchAndVerifyContact(page, userDetails, contactType)
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
  await page.waitForTimeout(1000)
  await searchAndVerifyContact(page, userDetails, contactType)
  page.locator('a.view-contact').click({force: true})
  await volunteerProfilePage.volunteerProfileTabs('groups');
  await page.waitForTimeout(1000)
  await selectDropdownOption(page, 'a.select2-choice.select2-default', 'Lead Volunteers');
  await page.waitForTimeout(1000)
  await volunteerProfilePage.clickAddButton()
  await page.click('a:has-text("Volunteers")');
  await page.waitForTimeout(3000)
  await volunteerProfilePage.clickVolunteerSuboption('Lead')
  // await selectVolunteerSuboption(page, 'Lead');
  // await page.waitForTimeout(2000)
});