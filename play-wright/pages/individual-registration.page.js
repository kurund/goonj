import { expect } from '@playwright/test';

exports.IndividualRegistrationPage =  class IndividualRegistrationPage {
  constructor(page) {
    this.page = page;
    this.url = process.env.BASE_URL_USER_SITE;
    this.firstNameField = page.locator('input#first-name-2')
    this.lastNameField = page.locator('input#first-name-3');
    this.emailField = page.locator('input#email-4');
    this.telephoneField = page.locator('#id-input-telephone');
    this.passwordField = page.locator('#id-input-password');
    this.confirmPasswordField = page.locator('#id-input-confirm');
    this.privacyPolicyCheckbox = page.locator('#id-input-checkbox');
    this.continueButton = page.locator('.page-continue');
    this.accountCreationMessage = page.locator('.page-title');
  }
  
  async enterFirstName(firstName) {
      await this.firstNameField.fill(firstName);
  }
  async enterLastName(lastName) {
    await this.lastNameField.fill(lastName);
  }

  async enterEmail(email) {
    await this.page.waitForSelector('input#email-4', { visible: true, timeout: 5000 });
    await this.emailField.fill(email);
  }

  getAppendedUrl(stringToAppend) {
    return this.url + stringToAppend;
  }

  async selectNameInitialDropdownOption(optionText) {
    // Click on the dropdown to open it
    await page.click('.form-group .select2-choice');

    // Wait for the dropdown options to appear (adjust selector as needed)
    await page.waitForSelector('.select2-results');

    // Find and click on the option with the specified text
    await page.click(`.select2-results li.select2-result-selectable div:has-text("${optionText}")`);

    // Optionally, wait for a brief moment to ensure selection is complete
    await page.waitForTimeout(500); // Adjust timeout as necessary
  }
}
