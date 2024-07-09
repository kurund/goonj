
import { } from '@playwright/test';

export async function userLogin(page) {
  const baseURL = process.env.BASE_URL_USER_SITE;
  const username = process.env.USERNAME;
  const password = process.env.PASSWORD;

  await page.goto(baseURL);
  await page.fill('#user_login', username); 
  await page.fill('#user_pass', password); 
  await page.click('#wp-submit');
}

