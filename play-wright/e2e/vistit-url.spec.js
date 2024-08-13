import { test} from '@playwright/test';
test('visit the url', async ({ page }) => {
    volunteerPageUrl = 'https://goonj-crm.staging.coloredcow.com/volunteer-registration/'
    await page.visit(volunteerPageUrl)
    await page.waitForURL(volunteerPageUrl)
})
