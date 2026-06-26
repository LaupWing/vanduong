# Theme Deployment — SiteGround

## How it works

Push to `main` → GitHub Actions builds the theme (Tailwind CSS) → rsync deploys to SiteGround via SSH.

## GitHub Secrets (repo → Settings → Secrets and variables → Actions)

| Secret | Value | Notes |
|--------|-------|-------|
| `SSH_HOST` | `esm24.siteground.biz` | Tied to the server, not the domain |
| `SSH_USER` | `u2465-hwxppqxg8cts` | From Site Tools → Devs → SSH Keys Manager |
| `SSH_PORT` | `18765` | SiteGround SSH port (not 22) |
| `SSH_PRIVATE_KEY` | Contents of `~/.ssh/siteground_github_actions` | Passwordless private key |
| `DEPLOY_PATH` | `/home/u2465-hwxppqxg8cts/www/vd.snelstack.com/public_html/wp-content/themes/vanduong/` | Trailing slash matters |

## SSH key pair

- Private key: `~/.ssh/siteground_github_actions` (passwordless, used by GitHub Actions)
- Public key: imported into SiteGround → Site Tools → Devs → SSH Keys Manager

If you reuse the same SiteGround account as another site, the key, `SSH_HOST`, and `SSH_USER`
can be shared — only `DEPLOY_PATH` changes (different theme folder / domain).

## SSH into SiteGround manually

```
ssh -p 18765 -i ~/.ssh/siteground_github_actions u2465-hwxppqxg8cts@esm24.siteground.biz
```

## Important notes

- The real WordPress path is under `/home/<user>/www/<domain>/public_html/` — NOT `/home/<user>/public_html/`
- SiteGround SSH port is `18765` (not the default 22)
- `SSH_HOST` is tied to the server, not the domain — should stay the same if the domain changes (verify with SiteGround)
- `DEPLOY_PATH` may change if the domain changes (because the domain is in the path) — verify after any domain change
- `build/` is gitignored locally but is rebuilt fresh in CI and uploaded; `src/` is excluded from the deploy
