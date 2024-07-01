// @ts-check
const { test, expect } = require('@playwright/test');

test('Login into admin site ', async ({ page }) => {
  // @ts-ignore
  const baseURL = process.env.BASE_URL_ADMIN_SITE
  const username = process.env.USERNAME;
  const password = process.env.PASSWORD;
  // @ts-ignore
  await page.goto('/');

  // Use environment variables for username and password
  const usernameField = page.locator('#user_login');
  // @ts-ignore
  await usernameField.fill(username); 
  // @ts-ignore
  await page.fill('#user_pass', password); 
  // Click the login button
  await page.click('#wp-submit'); 

});

