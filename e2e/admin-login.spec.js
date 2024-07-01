// @ts-check
const { test, expect } = require('@playwright/test');

test('has title', async ({ page }) => {
  // @ts-ignore
  const username = process.env.USERNAME;
  const password = process.env.PASSWORD;
  // @ts-ignore
  await page.goto(process.env.BASE_URL_ADMIN_SITE);
  await page.waitForURL('**/wp-login/**');
  await expect(page).toHaveURL('/wp-login');

  // Use environment variables for username and password
  
  // const currentURL = page.url();
  // const expectedSubstring = '/wp-login';
  // if (currentURL.includes(expectedSubstring)) {
  //   console.log('URL contains the expected substring.');
  // } else {
  //   console.log('URL does not contain the expected substring.');
  // }
  const usernameField = page.locator('#user_login');
  // @ts-ignore
  await usernameField.fill(username); 
  // @ts-ignore
  await page.fill('#user_pass', password); 
  // Click the login button
  await page.click('#wp-submit'); 
  await page.waitForURL('**/wp-admin/**');
  await expect(page).toHaveURL('/wp-admin');

});

