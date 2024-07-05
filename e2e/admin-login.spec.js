import { test, expect } from '@playwright/test';

test('Login as goonj admin user', async ({ page }) => {
  const baseURL = process.env.BASE_URL_USER_SITE
  const username = process.env.USERNAME;
  const password = process.env.PASSWORD;
  await page.goto(baseURL);
  await page.fill('#user_login', username); 
  await page.fill('#user_pass', password); 
  await page.click('#wp-submit');
  expect(page.url()).toContain('page=CiviCRM');
  await page.waitForSelector('.crm-title .title');
  //Get the text content of the CRM title
  const crmTitleText = await page.textContent('.crm-title .title');
  // Verify the CRM title text
  expect(crmTitleText.trim()).toBe('CiviCRM Home');
  page.locator('.wp-menu-name', { hasText: 'Volunteers' });
});

