import { test } from '@playwright/test';
import { IndividualRegistrationPage } from '../pages/individual-registration.page'; 

async function selectDropdownOption(page, dropdownSelector, dropdownOption) {
    // Click the dropdown to activate it
    await page.click(dropdownSelector);
    // Input the search term
    await page.fill('#s2id_autogen2_search', dropdownOption);
    // Click the desired option
    const optionSelector = `.select2-result-label:text("${dropdownOption}")`;
    await page.click(optionSelector);
    // Press Enter to select the option
    await page.press('.select2-input', 'Enter');
    await page.keyboard.press('Tab');
}

async function selectRadioButton(page, optionText) {
    // Find the label with the specific text and click the associated radio button
    const labelSelector = `label:has-text("${optionText}")`;
    await page.click(`${labelSelector} input[type="radio"]`);
}

async function selectGenderDropdown(page, dropdownOption) {
    // Click the dropdown to activate it
    await page.click('.select2-container');
  
    // Input the dropdown option
    await page.fill('.select2-focusser', dropdownOption);
  
    // Wait for the dropdown options to be visible
    // await page.waitForSelector('.select2-results');
  
    // // Click the desired option
    // const optionSelector = `.select2-result-label:text("${dropdownOption}")`;
    // await page.click(optionSelector);
  
    // Press Enter to select the option
    await page.press('.select2-focusser', 'Enter');
    // await page.keyboard.press('Tab');
}

test('get appended URL test', async ({ page }) => {
  const individualRegistrationPage = new IndividualRegistrationPage(page);
  // Get the appended URL
  const baseUrl = individualRegistrationPage.getAppendedUrl('/Registration');
  await page.goto(baseUrl);
  await page.waitForTimeout(1000)
  await selectDropdownOption(page, '.select2-container', 'Ms.');
 individualRegistrationPage.enterFirstName('DEEPAK')
 await page.waitForTimeout(200); 
  individualRegistrationPage.enterLastName('SINGH')
  await page.waitForTimeout(200); 
 individualRegistrationPage.enterEmail('deepak@mail.com')
 await page.waitForTimeout(200); 
 individualRegistrationPage.enterMobileNumber('1234567890')
//  await selectGenderDropdown(page, 'Female');
 await page.waitForTimeout(200); 
 individualRegistrationPage.enterStreetAddress('56, dwarka, sector-7')
 await page.waitForTimeout(400); 
 individualRegistrationPage.enterCityName('delhi')
 await page.waitForTimeout(400); 
 individualRegistrationPage.enterPostalCode('110070')
 await selectRadioButton(page, 'Yes');

});

