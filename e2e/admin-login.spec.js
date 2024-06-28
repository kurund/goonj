// @ts-check
const { test, expect } = require('@playwright/test');

test('has title', async ({ page }) => {
  await page.goto('https://goonj-crm.staging.coloredcow.com/wp-admin');
  const currentURL = page.url();
  const expectedSubstring = '/wp-login';
  if (currentURL.includes(expectedSubstring)) {
    console.log('URL contains the expected substring.');
  } else {
    console.log('URL does not contain the expected substring.');
  }
});

