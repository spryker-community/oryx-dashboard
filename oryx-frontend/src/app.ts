import { appBuilder } from '@spryker-oryx/application';
import { storefrontFeatures } from '@spryker-oryx/presets/storefront';
import { storefrontTheme } from '@spryker-oryx/themes';
import {provideExperienceData} from '@spryker-oryx/experience';
import {pieComponent} from "./components/pie/pie.def";
import {blankComponent} from "./components/blank/blank.def";

export const app = appBuilder()
    .withFeature(storefrontFeatures)
    .withTheme(storefrontTheme)
    .withEnvironment(import.meta.env)
    .withComponents([pieComponent])
    .withComponents([blankComponent])
    .withProviders([
        provideExperienceData({
            merge: {
                selector: "oryx-product-list",
                type: "replace",
            },
            type: "oryx-pie",
        }),
        provideExperienceData({
            merge: {
                selector: "oryx-content-image",
                type: "replace",
            },
            type: "oryx-blank",
        })
    ])
    .create();
