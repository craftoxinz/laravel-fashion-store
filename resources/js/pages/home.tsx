import { Head } from '@inertiajs/react';
import AppLayout from '@/components/layout/AppLayout/AppLayout';
import Section from '@/components/ui/section/Section';
import NewDropSection from '@/components/sections/NewDrop/NewDropSection';
import OurCategorySection from '@/components/sections/OurCategory/OurCategorySection';

export default function Home() {
    return (
        <AppLayout activePage="home">
            <Head title="Home" />
            <Section id="test-section">
                <NewDropSection />
                <OurCategorySection />
            </Section>
        </AppLayout>
    );
}
