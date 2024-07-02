import { test, expect } from '@playwright/test';

test('Login into admin site ', async ({ page }) => {
  const baseURL = process.env.BASE_URL_ADMIN_SITE
  const username = process.env.USERNAME;
  const password = process.env.PASSWORD;
  await page.goto(baseURL);
  expect(page.url()).toContain('/wp-login');
  const usernameField = page.locator('#user_login');
  await usernameField.fill(username); 
  await page.fill('#user_pass', password); 
  await page.click('#wp-submit');
  expect(page.url()).toContain('/wp-admin');

});

