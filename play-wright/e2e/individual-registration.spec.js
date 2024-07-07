import { test } from '@playwright/test';
import { IndividualRegistrationPage } from '../pages/individual-registration.page'; 

async function selectDropdownOption(page, dropdownSelector, searchTerm) {
    // Click the dropdown to activate it
    await page.click(dropdownSelector);
    // Input the search term
    await page.fill('#s2id_autogen2_search', searchTerm);
    // Click the desired option
    const optionSelector = `.select2-result-label:text("${searchTerm}")`;
    await page.click(optionSelector);
    // Press Enter to select the option
    await page.press('.select2-input', 'Enter');
    await page.keyboard.press('Tab');
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

});

