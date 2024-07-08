import { test } from '@playwright/test';
import { IndividualRegistrationPage } from '../pages/individual-registration.page'; 

// async function selectDropdownOption(page, dropdownSelector, dropdownOption) {
//     // Click the dropdown to activate it
//     await page.click(dropdownSelector);
//     // Input the search term
//     await page.fill('#s2id_autogen2_search', dropdownOption);
//     // Click the desired option
//     const optionSelector = `.select2-result-label:text("${dropdownOption}")`;
//     await page.click(optionSelector);
//     // Press Enter to select the option
//     await page.press('.select2-input', 'Enter');
//     await page.keyboard.press('Tab');
// }

// async function selectOptionByText(page, dropdownSelector, inputSelector, optionText) {
//     // Click the dropdown to activate it
//     await page.click(dropdownSelector);

//     // Input the search term into the input field
//     await page.fill(inputSelector, optionText);

//     // Click the desired option by text
//     const optionSelector = `.select2-result-label:text-is("${optionText}")`;
//     await page.click(optionSelector);

//     // Optionally, press Tab to move to the next field
//     await page.keyboard.press('Tab');
// }

async function selectRadioButton(page, optionText) {
    // Find the label with the specific text and click the associated radio button
    const labelSelector = `label:has-text("${optionText}")`;
    await page.click(`${labelSelector} input[type="radio"]`);
}

test('get appended URL test', async ({ page }) => {
  const individualRegistrationPage = new IndividualRegistrationPage(page);
        // Get the appended URL
  const baseUrl = individualRegistrationPage.getAppendedUrl('/Registration');
  await page.goto(baseUrl);
  await page.waitForTimeout(1000)
  await individualRegistrationPage.selectDropdownOption('#select2-chosen-2', '#s2id_autogen2_search', 'Ms.');
  individualRegistrationPage.enterFirstName('DEEPAK')
  await page.waitForTimeout(200); 
  individualRegistrationPage.enterLastName('SINGH')
  await page.waitForTimeout(200); 
  individualRegistrationPage.enterEmail('deepak@mail.com')
  await page.waitForTimeout(200); 
  individualRegistrationPage.enterMobileNumber('1234567890')
  await page.waitForTimeout(200); 
  await individualRegistrationPage.selectDropdownOption('#select2-chosen-3', '#s2id_autogen3_search', 'Male');
  individualRegistrationPage.enterStreetAddress('56, dwarka, sector-7')
  await page.waitForTimeout(400); 
  individualRegistrationPage.enterCityName('delhi')
  await page.waitForTimeout(400); 
  await individualRegistrationPage.selectDropdownOption('#select2-chosen-1', '#s2id_autogen1_search', 'Delhi');
  individualRegistrationPage.enterPostalCode('110070')
  await individualRegistrationPage.selectDropdownOption('#select2-chosen-4', '#s2id_autogen4_search', 'India');
  await individualRegistrationPage.selectRadioButton('Yes');
  await page.waitForTimeout(400); 
  individualRegistrationPage.enterProfession('Devops engineer')

});

