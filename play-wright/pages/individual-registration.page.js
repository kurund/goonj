import { expect } from '@playwright/test';

exports.IndividualRegistrationPage =  class IndividualRegistrationPage {
  constructor(page) {
    this.page = page;
    this.url = process.env.BASE_URL_USER_SITE;
    this.firstNameField = page.locator('input#first-name-2')
    // this.firstNameField = page.getByLabel('First-Name')
    this.lastNameField = page.locator('input#last-name-3');
    this.emailField = page.locator('input#email-4');
    this.mobileNumberField = page.locator('input#phone-6');
    this.streetAddress = page.locator('input#street-address-10');
    this.cityName = page.locator('input#city-12');
    this.postalCode = page.locator('input#postal-code-14');
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

  async enterMobileNumber(mobileNumber) {
    await this.mobileNumberField.fill(mobileNumber);
  }

  async enterStreetAddress(streetAddress)
  {
    await this.streetAddress.fill(streetAddress)
  }

  async enterPostalCode(postalCode)
  {
    await this.postalCode.fill(postalCode)
  }

  async enterCityName(cityName)
  {
    await this.cityName.fill(cityName)
  }
  getAppendedUrl(stringToAppend) {
    return this.url + stringToAppend;
  }
}
