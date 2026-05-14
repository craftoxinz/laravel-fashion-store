import { Head } from '@inertiajs/react';
import AppLayout from '@/components/layout/AppLayout/AppLayout';

export default function Home() {
    return (
        <AppLayout activePage="home">
            <Head title="Home" />
            <section>
                <h1>Hello World!</h1>
                {/* Your HeroSection will go here next */}
            </section>
        </AppLayout>
    );
}
