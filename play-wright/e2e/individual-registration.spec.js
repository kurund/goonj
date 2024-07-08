import { test, expect } from '@playwright/test';
import { IndividualRegistrationPage } from '../pages/individual-registration.page'; 

test('submit the basic registration form', async ({ page }) => {
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
  await page.waitForTimeout(2000); 
//   await individualRegistrationPage.selectDropdownOption('#s2id_autogen5', '#s2id_autogen5', 'Raise funds'); 
//   await individualRegistrationPage.selectDropdownOption('#s2id_autogen6', '#s2id_autogen6', 'Marketing'); 
//   await individualRegistrationPage.selectDropdownOption('#s2id_autogen7', '#s2id_autogen7', 'Learn new skills');
  await individualRegistrationPage.selectDropdownOption('#select2-chosen-8', '#s2id_autogen8_search', '2 to 6 hours daily');
  individualRegistrationPage.enterProfession('Devops engineer')
  await page.waitForTimeout(400);  
  await individualRegistrationPage.handleDialogMessage('Please fill all required fields.');
  await individualRegistrationPage.clickSubmitButton();
  await page.waitForTimeout(1000)
});

