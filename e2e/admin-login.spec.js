// @ts-check
const { test, expect } = require('@playwright/test');

test('has title', async ({ page }) => {
  // @ts-ignore
  await page.goto(process.env.BASE_URL);

  // Use environment variables for username and password
  const username = process.env.USERNAME;
  const password = process.env.PASSWORD;

  // await page.goto('https://goonj-crm.staging.coloredcow.com/wp-admin');
  const currentURL = page.url();
  const expectedSubstring = '/wp-login';
  if (currentURL.includes(expectedSubstring)) {
    console.log('URL contains the expected substring.');
  } else {
    console.log('URL does not contain the expected substring.');
  }

  const usernameField = page.locator('#user_login');
  // @ts-ignore
  await usernameField.fill(username); // Replace 'admin' with the actual admin username
  // @ts-ignore
  await page.fill('#user_pass', password); // Replace 'password123' with the actual password
  // Click the login button
  await page.click('#wp-submit'); // Replace with the actual button selector

});

