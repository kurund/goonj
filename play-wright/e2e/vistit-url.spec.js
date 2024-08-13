import { test} from '@playwright/test';
test('visit the url', async ({ page }) => {
    const volunteerPageUrl = 'https://goonj-crm.staging.coloredcow.com/volunteer-registration/'
    await page.goto(volunteerPageUrl)
    await page.waitForURL(volunteerPageUrl)
})
