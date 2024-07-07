import { expect } from '@playwright/test';

exports.IndividualRegistrationPage =  class IndividualRegistrationPage {
  constructor(page) {
    this.page = page;
    this.url = process.env.BASE_URL_USER_SITE;
    this.firstNameField = page.locator('input#first-name-2')
    this.lastNameField = page.locator('input#last-name-3');
    this.emailField = page.locator('input#email-4');
    this.telephoneField = page.locator('#id-input-telephone');
    this.passwordField = page.locator('#id-input-password');
  }
  
  async enterFirstName(firstName) {
      await this.firstNameField.fill(firstName);
  }
  async enterLastName(lastName) {
    await this.lastNameField.fill(lastName);
  }

  async enterEmail(email) {
    await this.emailField.fill(email);
  }

  getAppendedUrl(stringToAppend) {
    return this.url + stringToAppend;
  }
}
