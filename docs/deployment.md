## Deployment Guidelines

Staging deployment is automated using Github action - Checkout the workflow for your deployment status - [workflow run - staging-deployment](https://github.com/ColoredCow/goonj/actions/workflows/staging-deployment.yml)

Checkout detailed deployment configurations - [staging-deployment.yml](../.github/workflows/staging-deployment.yml).

### Staging Deployment Steps
1. Raise the PR against the `main` branch.
2. Get the PR reviewed and merged into the `main` branch.
3. Go to [Staging Deployment GitHub action](https://github.com/ColoredCow/goonj/actions/workflows/staging-deployment.yml)
4. Confirm the deployment completion status
5. Go to staging site and test your relevant changes - https://goonj-crm.staging.coloredcow.com/ 
