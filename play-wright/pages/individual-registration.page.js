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
    this.cityName = page.locator('input#city-14');
    this.postalCode = page.locator('input#postal-code-15');
    this.profession = page.locator('input#volunteer-fields-profession-21')
    this.otherSkills = page.locator('input#volunteer-fields-others-skills-18')
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

  async enterProfession(profession)
  {
    await this.profession.fill(profession)
  }

  async selectDropdownOption(dropdownSelector, inputField, option) {
    // Click the dropdown to activate it
    await this.page.click(dropdownSelector);
    // Input the search option into the input field
    await this.page.fill(inputField, option);
    // Click the desired option by text
    const optionSelector = `.select2-result-label:text("${option}")`;
    await this.page.click(optionSelector);
    // Press Tab to move to the next field
    await this.page.keyboard.press('Tab');
  }

  async selectTitle(title) {
    await this.selectDropdownOption('#select2-chosen-2', '#s2id_autogen2_search', title);
  }

  async selectCountry(country) {
    await this.selectDropdownOption('#select2-chosen-4', '#s2id_autogen4_search', country);
  }

  async selectGender(gender) {
    await this.selectDropdownOption('#select2-chosen-3', '#s2id_autogen3_search', gender);
  }

  async selectState(state) {
    await this.selectDropdownOption('#select2-chosen-1', '#s2id_autogen1_search', state);
  }

  async selectActivityInterested(activity) {
    await this.selectDropdownOption('#s2id_autogen5', '#s2id_autogen5', activity);
  }

  async selectVoluntarySkills(skill) {
    await this.selectDropdownOption('#s2id_autogen6', '#s2id_autogen6', skill);
  }

  async selectVolunteerMotivation(motivation) {
    await this.selectDropdownOption('#s2id_autogen7', '#s2id_autogen7', motivation);
  }

  async selectVolunteerHours(hours) {
    await this.selectDropdownOption('#select2-chosen-8', '#s2id_autogen8_search', hours);
  }


  async selectRadioButton(buttonOption) {
    // Find the label with the specific text and click the associated radio button
    const labelSelector = `label:has-text("${buttonOption}")`;
    await this.page.click(`${labelSelector} input[type="radio"]`);
  }

  async handleDialogMessage(expectedMessage) {
    // Register event listener for dialog
    this.page.on('dialog', async (dialog) => {
    // Verify the message in dialog box
    expect(dialog.message()).toContain(expectedMessage);
    // Accept the dialog (click on OK button)
    await dialog.accept();
    });
  }

  async clickSubmitButton() {
    await this.page.getByRole('button', { name: /submit/i }).click({force: true});
  }
 
  async enterOtherSkills(skills)
  {
    await this.otherSkills.fill(skills)
  }

  getAppendedUrl(stringToAppend) {
    return this.url + stringToAppend;
  }
}
