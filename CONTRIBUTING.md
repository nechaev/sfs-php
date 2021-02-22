# Contribution Guide

## Issues

Issues are very valuable to this project. Ideas are a valuable source of contributions others can make. With a question
you show where contributors can improve the user experience.

Thank you for creating them.

## Bug Reports

If you file a bug report, your issue should contain a title and a clear description of the issue. You should also
include as much relevant information as possible and a code sample that demonstrates the issue. The goal of a bug report
is to make it easy for yourself - and others - to replicate the bug and develop a fix.

Remember, bug reports are created in the hope that others with the same problem will be able to collaborate with you on
solving it. Do not expect that the bug report will automatically see any activity or that others will jump to fix it.
Creating a bug report serves to help yourself and others start on the path of fixing the problem.

## Pull Requests

Pull requests are, a great way to get your ideas into this repository.

When deciding if I merge in a pull request I look at the following things:

### Does it state intent

You should be clear which problem you're trying to solve with your contribution.

### Is it of good quality

- Are there unit tests
- Has the documentation (PHPDoc)
- Are the lints all passing
- Is the pull request reasonably small, or split over multiple

### Does it follow the Coding Style

Read about it bellow.

## Which Branch?

**All** bug fixes should be sent to the latest stable branch. Bug fixes should **never** be sent to the `main` branch
unless they fix features that exist only in the upcoming release.

**Minor** features that are **fully backward compatible** with the current release may be sent to the latest stable
branch.

**Major** new features should always be sent to the `main` branch, which contains the upcoming release.

If you are unsure if your feature qualifies as a major or minor, please ask me.

## Coding Style

SFS-PHP follows the [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)
coding standard.

