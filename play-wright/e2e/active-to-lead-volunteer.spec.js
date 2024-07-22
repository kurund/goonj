import { test, expect } from '@playwright/test';
import { userDetails, userLogin, submitVolunteerRegistrationForm, searchAndVerifyContact  } from '../utils.js';
import { VolunteerProfilePage } from '../pages/volunteer-profile.page';

test('update status of volunteer from active to Lead', async ({ page }) => {
  const volunteerProfilePage = new VolunteerProfilePage(page);
  const individualContactType = 'Individual'
  const volunteerContactType = '- Volunteer'
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
  await searchAndVerifyContact(page, userDetails, individualContactType)
  page.locator('a.view-contact').click({force: true})
  await volunteerProfilePage.volunteerProfileTabs('groups');
  await page.waitForTimeout(1000)
  await volunteerProfilePage.selectAddToGroupOption('Lead Volunteers');
  await page.waitForTimeout(1000)
  await volunteerProfilePage.clickAddButton()
  await page.click('table#option11 a:has-text("Lead Volunteers")');
  await page.click('#searchForm summary:has-text("Find Contacts within this Group")');
  await searchAndVerifyContact(page, userDetails, volunteerContactType)
  const leadVolunteerRowSelector = `table tbody tr:has(span[title="${userDetails.email}"])`;
  await page.waitForTimeout(1000)
  expect(leadVolunteerRowSelector).toContain(userDetails.email)
});