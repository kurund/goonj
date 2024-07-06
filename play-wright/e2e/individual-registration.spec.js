import { test } from '@playwright/test';
import { IndividualRegistrationPage } from '../pages/individual-registration.page'; 


async function selectDropdownOptionByText(page, dropdownInputId, optionText) {
    // Click on the dropdown to open it
    const dropdownSelector = `div#s2id_${dropdownInputId.split('-').pop()}`;
    await page.click(dropdownSelector);
  
    // Wait for the dropdown options to be visible
    await page.waitForSelector('.select2-results li');
  
    // Construct the selector for the desired option based on its text
    const optionSelector = `.select2-results li:has-text("${optionText}")`;
  
    // Click on the desired option
    await page.click(optionSelector);
}


test('get appended URL test', async ({ page }) => {
  const individualRegistrationPage = new IndividualRegistrationPage(page);
  
  // Get the appended URL
  const baseUrl = individualRegistrationPage.getAppendedUrl('/Registration');
  // Navigate to the appended URL
  await page.goto(baseUrl);
  await page.waitForTimeout(4000)
//   individualRegistrationPage.selectNameInitialDropdownOption('Mr')
 await page.click('.form-group .select2-choice');
 await page.keyboard.press('Tab');
// await selectDropdownOptionByText(page, '#prefix-id-1', 'Mr.'); // Example: Selects 'Mrs.'
 await page.waitForTimeout(2000)

 // Input text into the first name field
 await page.fill('input#first-name-2', 'John');
//  individualRegistrationPage.enterFirstName('DEEPAK')
//  individualRegistrationPage.enterEmail('deepak@mail.com')
//  individualRegistrationPage.enterLastName('SINGH')
await page.fill('input#last-name-3', 'singh');
await page.fill('input#email-4', 'johnsingh@mail.com');
await page.fill('input#phone-6', '1234567890');


});

